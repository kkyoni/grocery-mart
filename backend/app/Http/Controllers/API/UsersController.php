<?php

namespace App\Http\Controllers\API;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Jobs\OTPVerifyJob;
use App\Jobs\InvoiceJob;
use App\Jobs\ContactJob;
use App\Jobs\SupportJob;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Comment;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuthExceptions\JWTException;
use App\Models\User;
use App\Models\Brand;
use App\Models\Categories;
use App\Models\Otp;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use Tymon\JWTAuth\Facades\JWTAuth;
use Carbon\Carbon;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Contact;
use App\Models\Faq;
use App\Models\Promo;
use App\Models\PromoUser;
use App\Models\Setting;
use App\Models\Support;
use App\Models\UserAddress;
use Exception;
use Stripe;
use Tymon\JWTAuthExceptions\TokenExpiredException;
use Tymon\JWTAuthExceptions\TokenInvalidException;

class UsersController extends Controller
{
    public function getAuthenticatedUser()
    {
        try {
            if (!$user = JWTAuth::parseToken()->authenticate()) {
                return response()->json(['user_not_found'], 404);
            }
        } catch (TokenExpiredException $exception) {
            return response()->json(['token_expired'], $exception->getMessage());
        } catch (TokenInvalidException $exception) {
            return response()->json(['token_invalid'], $exception->getMessage());
        } catch (JWTException $exception) {
            return response()->json(['token_absent'], $exception->getMessage());
        }
        return response()->json(compact('user'));
    }

    public function login(Request $request)
    {
        $validation_array = [
            'email'         => 'required',
            'password'         => 'required',
        ];
        $validation = Validator::make($request->all(), $validation_array);
        if ($validation->fails()) {
            return response()->json(['status' => 'error', 'message' => $validation->messages()->first()], 200);
        }
        try {
            $credentials = $request->only('email', 'password', 'user_type');
            $data = [];
            if (!$token = JWTAuth::attempt($credentials)) {
                return response()->json(['status' => 'error', 'message' => 'Invalid Credentials, Please try again', 'data' => (object)[]], 200);
            }
            $userTypeCheck = User::where('email', $request->get('email'))->where('status', 'active')->first();
            if ($userTypeCheck->user_type == 'user') {
                $data['token'] = $token;
                $data = $userTypeCheck;
                $userTypeCheck->save();
                // Sent otp code
                $otpNumber = random_int(1000, 9999);
                $checkContactNumInUser = User::where('email', $userTypeCheck->email)->first();
                // dd($checkContactNumInUser);
                if ($checkContactNumInUser !== null) {
                    $checkIfUserOtpExist = Otp::where('email', $checkContactNumInUser->email)->first();
                    if ($checkIfUserOtpExist !== null) {
                        Otp::where('id', $checkIfUserOtpExist->id)
                            ->where('email', $checkContactNumInUser->email)
                            ->update([
                                'otp_number'    => $otpNumber,
                                'otp_expire'    => $checkIfUserOtpExist->updated_at->addSeconds(180)
                            ]);
                    } else {
                        $UserOtpCreated = Otp::create([
                            'email'         => $checkContactNumInUser->email,
                            'otp_number'    => $otpNumber,
                        ]);
                        Otp::where('id', $UserOtpCreated->id)->update([
                            'otp_expire'    => $UserOtpCreated->created_at->addSeconds(180)
                        ]);
                    }
                    $text = 'Your OTP is: ' . $otpNumber;
                    $emailcontent = array(
                        'text' => $text,
                        'title' => 'Thanks for join Grocery Mart - Ecommerce, Please use Below OTP for Complete SignUp Process. You will need to complete Sign Up Process enter OTP.',
                        'userName' => $checkContactNumInUser->first_name
                    );
                    $details['email'] = $checkContactNumInUser->email;
                    $details['username'] = $checkContactNumInUser->first_name . ' ' . $checkContactNumInUser->last_name;
                    $details['subject'] = 'OTP Confirmation';
                    dispatch(new OTPVerifyJob($details, $emailcontent));
                    $data['otpNumber'] = $otpNumber;
                }
                // sent otp code
                return response()->json(['status' => 'success', 'message' => 'Login successfully', 'data' => $data], 200);
            }
        } catch (Exception $exception) {
            return response()->json(['message'   => $exception->getMessage()]);
        }
    }
    /*--------------------------------------------------------------------------
    | Send Otp
    |--------------------------------------------------------------------------|*/
    public function sendOtp(Request $request)
    {
        $validator =  Validator::make($request->all(), [
            'email' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json(['status' => 'error', 'message' => $validator->messages()->first()]);
        }
        try {
            $otpNumber = random_int(1000, 9999);
            $checkContactNumInUser = User::where('email', $request->get('email'))->first();
            if ($checkContactNumInUser !== null) {
                $checkIfUserOtpExist = Otp::where('email', $checkContactNumInUser->email)->first();
                if ($checkIfUserOtpExist !== null) {
                    Otp::where('id', $checkIfUserOtpExist->id)
                        ->where('email', $checkContactNumInUser->email)
                        ->update([
                            'otp_number'    => $otpNumber,
                            'otp_expire'    => $checkIfUserOtpExist->updated_at->addSeconds(180)
                        ]);
                } else {
                    $UserOtpCreated = Otp::create([
                        'email'         => $checkContactNumInUser->email,
                        'otp_number'    => $otpNumber,
                    ]);
                    Otp::where('id', $UserOtpCreated->id)->update([
                        'otp_expire'    => $UserOtpCreated->created_at->addSeconds(180)
                    ]);
                }
                $text = 'Your OTP is: ' . $otpNumber;
                $emailcontent = array(
                    'text' => $text,
                    'title' => 'Thanks for join Grocery Mart - Ecommerce, Please use Below OTP for Complete SignUp Process. You will need to complete Sign Up Process enter OTP.',
                    'userName' => $checkContactNumInUser->first_name
                );
                $details['email'] = $checkContactNumInUser->email;
                $details['username'] = $checkContactNumInUser->first_name;
                $details['subject'] = 'OTP Confirmation';
                dispatch(new OTPVerifyJob($details, $emailcontent));
            } else {
                return response()->json(['status' => 'error', 'message' => 'Mobile number does not exist.']);
            }
            return response()->json(['status' => 'success', 'message' => 'Otp sent successfully', 'data' => $otpNumber]);
        } catch (Exception $exception) {
            return response()->json(['message' => $exception->getMessage()]);
        }
    }

    /*--------------------------------------------------------------------------
    | Verify Otp
    |--------------------------------------------------------------------------|*/
    public function verifyOtp(Request $request)
    {
        $validator =  Validator::make($request->all(), [
            'email' => 'required',
            'otp_number'    => 'required|max:4|min:4'
        ]);
        if ($validator->fails()) {
            return response()->json(['status'    => 'error', 'message'   => $validator->messages()->first()]);
        }
        try {
            $getOtpData = Otp::where('otp_number', $request->get('otp_number'))->where('email', $request->get('email'))->first();
            if ($getOtpData !== null) {
                if (Carbon::now() >= Carbon::parse()) {
                    return response()->json(['status' => 'error', 'message' => 'Otp Expired']);
                }
                $getOtpuser = Otp::with('user')->where('email', $request->get('email'))->first();
                return response()->json(['status'    => 'success', 'message'   => 'OTP is Verified.', 'data'        => $getOtpuser]);
            }
            return response()->json(['status'    => 'error', 'message'   => 'Invalid Otp Details',]);
        } catch (Exception $exception) {
            return response()->json(['message'   => $exception->getMessage()]);
        }
    }

    public function getproducts(Request $request)
    {
        try {
            $product = Product::with(['productimage'])->orderBy('id', 'desc')->get();
            foreach ($product as $key => $value) {
                if (date('Y-m-d', strtotime($value['updated_at'])) >= date('Y-m-d')) {
                    $value['new_offer'] = 'new';
                    $value['qty'] = 1;
                    $value['main_price'] = $value->price;
                } else {
                    $value['new_offer'] = 'old';
                    $value['qty'] = 1;
                    $value['main_price'] = $value->price;
                }
            }
            if (sizeof($product) > 0) {
                return response()->json([
                    'product'  => $product,
                    'status' => 'success',
                    'message' => 'Product Listed Successfully !!'
                ]);
            } else {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Product Record Not Successfully !!'
                ]);
            }
        } catch (Exception $exception) {
            return response()->json(['message' => $exception->getMessage()]);
        }
    }

    public function gettopproducts(Request $request)
    {
        try {
            $product = Product::with(['productimage'])->orderBy('id', 'desc')->limit(8)->get();
            foreach ($product as $key => $value) {
                if (date('Y-m-d', strtotime($value['updated_at'])) >= date('Y-m-d')) {
                    $value['new_offer'] = 'new';
                    $value['qty'] = 1;
                } else {
                    $value['new_offer'] = 'old';
                    $value['qty'] = 1;
                }
            }
            if (sizeof($product) > 0) {
                return response()->json([
                    'product'  => $product,
                    'status' => 'success',
                    'message' => 'Product Top Listed Successfully !!'
                ]);
            } else {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Product Top Record Not Successfully !!'
                ]);
            }
        } catch (Exception $exception) {
            return response()->json(['message' => $exception->getMessage()]);
        }
    }

    public function getbrand(Request $request)
    {
        try {
            $brand = Brand::orderBy('id', 'desc')->get();
            if (sizeof($brand) > 0) {
                return response()->json([
                    'brand'  => $brand,
                    'status' => 'success',
                    'message' => 'Brand Listed Successfully !!'
                ]);
            } else {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Brand Record Not Successfully !!'
                ]);
            }
        } catch (Exception $exception) {
            return response()->json(['message' => $exception->getMessage()]);
        }
    }

    public function getcategories(Request $request)
    {
        try {
            $categories = Categories::orderBy('id', 'desc')->get();
            if (sizeof($categories) > 0) {
                return response()->json([
                    'categories'  => $categories,
                    'status' => 'success',
                    'message' => 'Categories Listed Successfully !!'
                ]);
            } else {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Categories Record Not Successfully !!'
                ]);
            }
        } catch (Exception $exception) {
            return response()->json(['message' => $exception->getMessage()]);
        }
    }

    public function getblog(Request $request)
    {
        try {
            $blog = Blog::orderBy('id', 'desc')->get();
            foreach ($blog as $key => $value) {
                if ($key % 2 == 0) {
                    $value['number'] = 'even';
                } else {
                    $value['number'] = 'odd';
                }
            }
            if (sizeof($blog) > 0) {
                return response()->json([
                    'blog'  => $blog,
                    'status' => 'success',
                    'message' => 'Blog Listed Successfully !!'
                ]);
            } else {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Blog Record Not Successfully !!'
                ]);
            }
        } catch (Exception $exception) {
            return response()->json(['message' => $exception->getMessage()]);
        }
    }

    public function singlecategorys(Request $request, $id)
    {
        try {
            $product = Product::with(['productimage'])->where('category_id', $request->id)->get();
            foreach ($product as $key => $value) {
                if (date('Y-m-d', strtotime($value['updated_at'])) >= date('Y-m-d')) {
                    $value['new_offer'] = 'new';
                } else {
                    $value['new_offer'] = 'old';
                }
            }
            if (sizeof($product) > 0) {
                return response()->json([
                    'product'  => $product,
                    'status' => 'success',
                    'message' => 'Product Listed Successfully !!'
                ]);
            } else {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Product Record Not Successfully !!'
                ]);
            }
        } catch (Exception $exception) {
            return response()->json(['message' => $exception->getMessage()]);
        }
    }

    public function singleproduct(Request $request, $id)
    {
        try {
            $product = Product::with(['productimage'])->whereIn('id', [$request->id])->get();
            foreach ($product as $key => $value) {
                if (date('Y-m-d', strtotime($value['updated_at'])) >= date('Y-m-d')) {
                    $value['new_offer'] = 'new';
                } else {
                    $value['new_offer'] = 'old';
                }
            }
            if (sizeof($product) > 0) {
                return response()->json([
                    'product'  => $product,
                    'status' => 'success',
                    'message' => 'Product Listed Successfully !!'
                ]);
            } else {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Product Record Not Successfully !!'
                ]);
            }
        } catch (Exception $exception) {
            return response()->json(['message' => $exception->getMessage()]);
        }
    }

    public function userorder($user_id)
    {
        try {
            $order_list = Order::with(['OrderProductDetails'])->where('user_id', $user_id)->get();
            if (!empty($order_list)) {
                return response()->json([
                    'order_list'  => $order_list,
                    'status' => 'success',
                    'message' => 'Order Listed Successfully !!'
                ]);
            } else {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Order Record Not Successfully !!'
                ]);
            }
        } catch (Exception $exception) {
            return response()->json(['message' => $exception->getMessage()]);
        }
    }

    public function singleuserorder($id)
    {
        try {
            $order = Order::with(['OrderProductDetails'])->where('id', $id)->first();
            $order['zip'] = $order['UserAddressDetails']['zip'];
            $order['street_address'] = $order['UserAddressDetails']['street_address'];
            $order['optional'] = $order['UserAddressDetails']['optional'];
            $order['city'] = $order['UserAddressDetails']['city'];
            $order['states'] = $order['UserAddressDetails']['states'];
            $order['country'] = $order['UserAddressDetails']['country'];
            if (!empty($order)) {
                return response()->json([
                    'order'  => $order,
                    'status' => 'success',
                    'message' => 'Single Order Listed Successfully !!'
                ]);
            } else {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Single Order Record Not Successfully !!'
                ]);
            }
        } catch (Exception $exception) {
            return response()->json(['message' => $exception->getMessage()]);
        }
    }

    public function useraddress($id)
    {
        try {
            $alluserAddress = UserAddress::where('user_id', $id)->get();
            if (sizeof($alluserAddress) > 0) {
                return response()->json([
                    'alluserAddress'  => $alluserAddress,
                    'status' => 'success',
                    'message' => 'Order Listed Successfully !!'
                ]);
            } else {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Order Record Not Successfully !!'
                ]);
            }
        } catch (Exception $exception) {
            return response()->json(['message' => $exception->getMessage()]);
        }
    }

    public function usereditaddress($address_id)
    {
        try {
            $usereditaddress = UserAddress::where('id', $address_id)->first();
            if (!empty($usereditaddress)) {
                return response()->json([
                    'usereditaddress'  => $usereditaddress,
                    'status' => 'success',
                    'message' => 'User Edit Address Listed Successfully !!'
                ]);
            } else {
                return response()->json([
                    'status' => 'error',
                    'message' => 'User Edit Address Record Not Successfully !!'
                ]);
            }
        } catch (Exception $exception) {
            return response()->json(['message' => $exception->getMessage()]);
        }
    }

    public function useraddressdelete($address_id, $user_id)
    {
        try {
            $UserAddressDelete = UserAddress::where('id', $address_id)->first();
            $UserAddressDelete->delete();
            $alluserAddress = UserAddress::where('user_id', $user_id)->get();
            if (!empty($UserAddressDelete)) {
                return response()->json([
                    'alluserAddress' => $alluserAddress,
                    'status' => 'success',
                    'message' => 'User Address Delete Listed Successfully !!'
                ]);
            } else {
                return response()->json([
                    'status' => 'error',
                    'message' => 'User Address Delete Record Not Successfully !!'
                ]);
            }
        } catch (Exception $exception) {
            return response()->json(['message' => $exception->getMessage()]);
        }
    }

    public function useraddressselect($address_id, $user_id)
    {
        try {
            User::where('id', $user_id)->update([
                'address_id' => $address_id
            ]);
            $userset = User::where('id', $user_id)->first();
            $alluserAddress = UserAddress::where('user_id', $user_id)->get();
            return response()->json([
                'userset' => $userset,
                'alluserAddress' => $alluserAddress,
                'status' => 'success',
                'message' => 'Select Address Successfully !!'
            ]);
        } catch (Exception $exception) {
            return response()->json(['message' => $exception->getMessage()]);
        }
    }
    public function singlebrand(Request $request, $id)
    {
        try {
            $brand = Categories::with(['product_details'])->where('brand_id', $request->id)->get();
            if (sizeof($brand) > 0) {
                return response()->json([
                    'brand'  => $brand,
                    'status' => 'success',
                    'message' => 'Brand Listed Successfully !!'
                ]);
            } else {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Brand Record Not Successfully !!'
                ]);
            }
        } catch (Exception $exception) {
            return response()->json(['message' => $exception->getMessage()]);
        }
    }

    public function productssingle(Request $request, $id)
    {
        try {
            $productsdetail = Product::with(['productimage'])->where('id', $id)->first();
            if (date('Y-m-d', strtotime($productsdetail['updated_at'])) >= date('Y-m-d')) {
                $productsdetail['new_offer'] = 'new';
            } else {
                $productsdetail['new_offer'] = 'old';
            }
            $productsdetail['qty'] = 1;
            $productsdetail['main_price'] = $productsdetail->price;
            return response()->json([
                'productsdetail'  => $productsdetail,
                'status' => 'success',
                'message' => 'Products Detail Listed Successfully !!'
            ]);
        } catch (Exception $exception) {
            return response()->json(['message' => $exception->getMessage()]);
        }
    }

    public function productsprice(Request $request, $min, $max)
    {
        try {
            $productsprice = Product::with(['productimage'])->whereBetween('price', [$min, $max])->get();
            foreach ($productsprice as $key => $value) {
                if (date('Y-m-d', strtotime($value['updated_at'])) >= date('Y-m-d')) {
                    $value['new_offer'] = 'new';
                } else {
                    $value['new_offer'] = 'old';
                }
            }
            if (sizeof($productsprice) > 0) {
                return response()->json([
                    'productsprice'  => $productsprice,
                    'status' => 'success',
                    'message' => 'Product Price Listed Successfully !!'
                ]);
            } else {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Product Price Record Not Successfully !!'
                ]);
            }
        } catch (Exception $exception) {
            return response()->json(['message' => $exception->getMessage()]);
        }
    }

    public function productssorting(Request $request, $sort)
    {
        try {
            if ($sort == 'lowtohigh') {
                $sort_price = "price";
                $sort_list = "ASC";
            } elseif ($sort == 'hightolow') {
                $sort_price = "price";
                $sort_list = "DESC";
            } else {
                $sort_price = "id";
                $sort_list = "DESC";
            }
            $productssort = Product::with(['productimage'])->orderBy($sort_price, $sort_list)->get();
            foreach ($productssort as $key => $value) {
                if (date('Y-m-d', strtotime($value['updated_at'])) >= date('Y-m-d')) {
                    $value['new_offer'] = 'new';
                } else {
                    $value['new_offer'] = 'old';
                }
            }
            if (sizeof($productssort) > 0) {
                return response()->json([
                    'productssort'  => $productssort,
                    'status' => 'success',
                    'message' => 'Product Sort Listed Successfully !!'
                ]);
            } else {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Product Sort Record Not Successfully !!'
                ]);
            }
        } catch (Exception $exception) {
            return response()->json(['message' => $exception->getMessage()]);
        }
    }
    public function checkoutsave(Request $request)
    {
        dd($request->all());
        try {
            $order_details = Order::create([
                'invoice' => random_int(00000000001, 99999999999),
                'comment' => $request->comments,
                'grandtotal' => $request->newTotal,
            ]);
            if (!empty($order_details)) {
                foreach ($request->product_cart as $values) {
                    OrderProduct::create([
                        'order_id' => $order_details->id,
                        'product_id' => $values['id'],
                        'category_id' => $order_details->category_id,
                        'name' => $values['name'],
                        'description' => $values['description'],
                        'price' => $values['price'],
                        'new_offer' => $values['new_offer'],
                    ]);
                }
            }
            $ProductOrder = OrderProduct::where('order_id', $order_details->id)->get();
            $table = [];
            foreach ($ProductOrder as $key => $value) {
                $table[$key]['product'] = '<tr class="item">
                <td>' . $value->name . '</td>
                <td>₹' . $value->price . '</td>
                </tr>';
            }
            $text = $table;
            $emailcontent = array(
                'text' => $text,
                'invoice' => $order_details->invoice,
                'date' => $order_details->created_at,
                'ProductOrderTotal' => $order_details->grandtotal,
                'userName' => 'Modi jaymin'
            );
            $details['email'] = 'modijaymin86@gmail.com';
            $details['username'] = 'Modi Jaymin';
            $details['subject'] = 'Invoice Bil';
            dispatch(new InvoiceJob($details, $emailcontent));

            return response()->json([
                'status' => 'success',
                'message' => 'Order is SucessFully ⚡️'
            ]);
        } catch (Exception $exception) {
            return response()->json(['message' => $exception->getMessage()]);
        }
    }

    public function payment(Request $request)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        $token = \Stripe\Token::create(array(
            "card" => array(
                "number"    => '4242424242424242',
                "exp_month" => 12,
                "exp_year"  => 2025,
                "cvc"       => 075,
                "name"      => "Sagar Darji",
            )
        ));
        dd($token);
        // $validator = Validator::make($request->all(), [
        //     'full_name' => 'required',
        //     'company_name' => 'required',
        //     'job_title' => 'required',
        //     'address' => 'required',
        //     'city' => 'required',
        //     'zipcode' => 'required',
        //     'country' => 'required',
        //     'card_number' => 'required',
        //     'card_holdername' => 'required',
        //     'expiry_date' => 'required',
        //     'cvv' => 'required',
        // ]);
        // if ($validator->fails()) {
        //     return redirect()->back()->withErrors($validator)->withInput();
        // }
        // $creditCardInfo = CreditCardInfo::where('user_id', auth()->user()->id)->first();
        // if (empty($creditCardInfo)) {
        //     $insertCreditCardInfo = CreditCardInfo::create([
        //         'user_id' => auth()->user()->id,
        //         'card_number' => $request->card_number,
        //         'card_holdername' => $request->card_holdername,
        //         'expiry_date' => $request->expiry_date,
        //         'cvv' => $request->cvv,
        //     ]);
        // } else {
        //     $creditCardInfo->card_number = $request->card_number;
        //     $creditCardInfo->card_holdername = $request->card_holdername;
        //     $creditCardInfo->expiry_date = $request->expiry_date;
        //     $creditCardInfo->cvv = $request->cvv;
        //     $creditCardInfo->save();
        // }
        // $packageDays = $packageData->month * 30;
        // $totalDays = $packageDays + $existDays;
        // if ($request->payment_type == 'stripe') {
        //     Stripe\Stripe::setApiKey(config('app.stripe_public_secret'));
        //     $data = $request->expiry_date;
        //     $cardDetails = explode('/', $data);
        //     // $token = \Stripe\Token::create(array(
        //     //   "card" => array(
        //     //     "number"    => $request->card_number,
        //     //     "exp_month" => $cardDetails[0],
        //     //     "exp_year"  => $cardDetails[1],
        //     //     "cvc"       => $request->cvv,
        //     //     "name"      => $request->card_holdername,
        //     //     )));
        //     $customerData = \Stripe\Customer::create([
        //         "email" => $userData->email,
        //         "name" => $userData->firstName,
        //         // "account_balance" => ($packageData->price * 100),
        //         "source" => $request->stoken,
        //         // "address[line1]" => 'Ahmedabad',
        //         // "address[postal_code]" => '382330',
        //         // "address[city]" => 'Ahmedabad',
        //         // "address[state]" => 'Ahmedabad',
        //         // "address[country]" => 'India',
        //     ]);
        //     // dd($customerData->id);
        //     $charged = \Stripe\Charge::create([
        //         "customer" => $customerData->id,
        //         "amount" => ($purchasePrice * 100),
        //         "currency" => 'GBP',
        //         // "source" => $request->stoken,
        //         // "card" => $request->stoken,
        //         "description" => "One-time setup fee",
        //     ]);

        //     if ($charged->status == 'succeeded') {

        //         return redirect()->route('front.profile')->with([
        //             'title'     => 'Success',
        //             'message'   => 'You Transaction Successfully Done',
        //             'type'      => 'success',
        //         ]);
        //     }
        // }
    }

    public function checkoutsavecod(Request $request)
    {
        try {
            $order_details = Order::create([
                'invoice' => random_int(00000000001, 99999999999),
                'comment' => $request->comments,
                'grandtotal' => $request->newTotal,
                'maintotal' => $request->maintotal,
                'promototal' => $request->promototal,
                'user_id' => $request->user_id,
                'address_id' => $request->address_id,
                'promo_id' => @$request->promo_id,
                'status' => 'processing',
                'payment_mode' => 'cod',
            ]);
            if (!empty($order_details)) {
                foreach ($request->product_cart as $values) {
                    OrderProduct::create([
                        'order_id' => $order_details->id,
                        'product_id' => $values['id'],
                        'category_id' => $values['category_id'],
                        'product_image' => $values['productimage'][0]['image'],
                        'name' => $values['name'],
                        'description' => $values['description'],
                        'price' => $values['price'],
                        'qty' => $values['qty'],
                        'main_price' => $values['main_price'],
                        'new_offer' => $values['new_offer'],
                    ]);
                }
            }

            $ProductOrder = OrderProduct::where('order_id', $order_details->id)->get();
            $UserProductOrder = User::with(['UserAddress'])->where('id', $order_details->user_id)->first();
            $table = [];
            $i = 1;
            foreach ($ProductOrder as $key => $value) {
                $table[$key]['product'] = '<tr>
                <td class="tm_width_1">' . $i++ . '</td>
                <td class="tm_width_4">' . $value->name . '</td>
                <td class="tm_width_2">' . $value->qty . '</td>
                <td class="tm_width_3">₹' . $value->main_price . '</td>
                <td class="tm_width_2 tm_text_right">₹' . $value->price . '</td>
                </tr>';
            }
            $text = $table;
            $emailcontent = array(
                'text' => @$text,
                'invoice' => @$order_details->invoice,
                'date' => date_format($order_details->created_at, 'd.m.Y'),
                'ProductOrderTotal' => @$order_details->grandtotal,
                'optional' => @$UserProductOrder['UserAddress']['optional'],
                'street_address' => @$UserProductOrder['UserAddress']['street_address'],
                'city' => @$UserProductOrder['UserAddress']['city'],
                'states' => @$UserProductOrder['UserAddress']['states'],
                'country' => @$UserProductOrder['UserAddress']['country'],
                'zip' => @$UserProductOrder['UserAddress']['zip'],
                'PromoSum' => @$order_details->promototal,
                'Subtotal' => @$order_details->maintotal,
                'userName' => @$UserProductOrder->first_name . ' ' . @$UserProductOrder->last_name
            );
            $details['email'] = @$UserProductOrder->email;
            $details['username'] = @$UserProductOrder->first_name . ' ' . @$UserProductOrder->last_name;
            $details['subject'] = 'Grocery Mart - Invoice';
            dispatch(new InvoiceJob($details, $emailcontent));

            return response()->json([
                'status' => 'success',
                'message' => 'Order is SucessFully ⚡️'
            ]);
        } catch (Exception $exception) {
            return response()->json(['message' => $exception->getMessage()]);
        }
    }

    public function blogdetail(Request $request, $id)
    {
        try {
            $blogdetail = Blog::where('id', $id)->first();
            $NextBlogId = $blogdetail->id + 1;
            $PreviousBlogId = $blogdetail->id - 1;
            return response()->json([
                'blogdetail'  => $blogdetail,
                'NextBlogId'  => $NextBlogId,
                'PreviousBlogId'  => $PreviousBlogId,
                'status' => 'success',
                'message' => 'Blog Detail Listed Successfully !!'
            ]);
        } catch (Exception $exception) {
            return response()->json(['message' => $exception->getMessage()]);
        }
    }

    public function addcontact(Request $request)
    {
        try {
            $data = [
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'message' => $request->message,
            ];
            $contact = Contact::create($data);
            if ($contact) {

                $emailcontent = array(
                    'title' => 'Contact Inquiry',
                    'text' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum",
                    'userName' => $contact->first_name . ' ' . $contact->last_name
                );
                $details['email'] = $contact->email;
                $details['username'] = $contact->first_name . ' ' . $contact->last_name;
                $details['subject'] = 'Contact Inquiry';
                dispatch(new ContactJob($details, $emailcontent));

                return response()->json([
                    'contact'  => $contact,
                    'status' => 'success',
                    'message' => 'Contact Added Sucessfully !!'
                ]);
            } else {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Contact Not Sucessfully !!'
                ]);
            }
        } catch (Exception $exception) {
            return response()->json(['message' => $exception->getMessage()]);
        }
    }

    public function addsupport(Request $request)
    {
        try {
            $data = [
                'supportname' => $request->supportname,
                'supportemail' => $request->supportemail,
                'supportmessage' => $request->supportmessage,
            ];
            $support = Support::create($data);
            if ($support) {

                $emailcontent = array(
                    'title' => 'Support Inquiry',
                    'text' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum",
                    'userName' => $support->supportname
                );
                $details['email'] = $support->supportemail;
                $details['username'] = $support->supportname;
                $details['subject'] = 'Support Inquiry';
                dispatch(new SupportJob($details, $emailcontent));

                return response()->json([
                    'support'  => $support,
                    'status' => 'success',
                    'message' => 'Support Added Sucessfully !!'
                ]);
            } else {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Support Not Sucessfully !!'
                ]);
            }
        } catch (Exception $exception) {
            return response()->json(['message' => $exception->getMessage()]);
        }
    }

    public function sitelogo(Request $request)
    {
        try {
            $setting = Setting::where('code', 'application_logo')->first();
            if ($setting) {
                return response()->json([
                    'setting'  => $setting,
                    'status' => 'success',
                    'message' => 'setting Listed Successfully !!'
                ]);
            } else {
                return response()->json([
                    'status' => 'error',
                    'message' => 'setting Record Not Successfully !!'
                ]);
            }
        } catch (Exception $exception) {
            return response()->json(['message' => $exception->getMessage()]);
        }
    }

    public function getfaq(Request $request)
    {
        try {
            $faq = Faq::where('status', 'active')->orderBy('id', 'desc')->get();
            if (sizeof($faq) > 0) {
                return response()->json([
                    'faq'  => $faq,
                    'status' => 'success',
                    'message' => 'Faq Listed Successfully !!'
                ]);
            } else {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Faq Record Not Successfully !!'
                ]);
            }
        } catch (Exception $exception) {
            return response()->json(['message' => $exception->getMessage()]);
        }
    }

    public function addcomment(Request $request)
    {
        if (!$request->user_id) {
            return response()->json([
                'status' => 'error',
                'message' => 'Login User !!'
            ]);
        }
        if (!$request->comment) {
            return response()->json([
                'status' => 'error',
                'message' => 'Comment is Required !!'
            ]);
        }
        try {
            Comment::create([
                'user_id' => $request->user_id,
                'blog_id' => $request->blog_id,
                'comment' => $request->comment,
            ]);
            $Comment = Comment::with(['UserDetails'])->where('blog_id', $request->blog_id)->orderby('id', 'desc')->get();
            return response()->json([
                'Comment' => $Comment,
                'status' => 'success',
                'message' => 'Contact Added Sucessfully !!'
            ]);
        } catch (Exception $exception) {
            return response()->json(['message' => $exception->getMessage()]);
        }
    }

    public function getcomment(Request $request, $id)
    {
        try {
            $Comment = Comment::with(['UserDetails'])->where('blog_id', $id)->orderby('id', 'desc')->get();
            return response()->json([
                'Comment' => $Comment,
                'status' => 'success',
                'message' => 'Contact Added Sucessfully !!'
            ]);
        } catch (Exception $exception) {
            return response()->json(['message' => $exception->getMessage()]);
        }
    }


    public function promocode(Request $request)
    {
        try {

            $now = date('Y-m-d');
            $checking_promo = Promo::where('code', $request->promocode)->whereDate('start_date', '<=', $now)->whereDate('end_date', '>=', $now)->where('status', 'active')->first();
            if (!empty($checking_promo)) {
                $check_promo = PromoUser::where('user_id', $request->user_id)->where('promo_id', $checking_promo->id)->first();
                if (!empty($check_promo)) {
                    $check_order = Order::where('user_id', $request->user_id)->where('promo_id', $checking_promo->id)->first();
                    if (empty($check_order)) {
                        $DisCount = Helper::checkDiscount(number_format((float)$request->newTotal, 2, '.', ''), number_format((float)$checking_promo->discount, 2, '.', ''));
                        return response()->json([
                            'promo_id' => $checking_promo->id,
                            'DisCount' => $DisCount['discount'],
                            'promototal' => $DisCount['promototal'],
                            'status' => 'success',
                            'message' => 'Promo Code Sucessfully!!'
                        ]);
                    } else {
                        return response()->json([
                            'status' => 'error',
                            'message' => 'Promo Code Is Already In Use!!'
                        ]);
                    }
                } else {
                    return response()->json([
                        'status' => 'error',
                        'message' => 'User Not Found Promo Code!!'
                    ]);
                }
            } else {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Not Found Promo Code!!'
                ]);
            }
        } catch (Exception $exception) {
            return response()->json(['message' => $exception->getMessage()]);
        }
    }

    public function profile(Request $request)
    {
        try {
            $firstnamemessage = '';
            $lastnamemessage = '';
            $emailmessage = '';
            if (empty($request->first_name)) {
                $firstnamemessage = "First Name Require !!";
            }
            if (empty($request->last_name)) {
                $lastnamemessage = "Last Name Require !!";
            }
            if (empty($request->email)) {
                $emailmessage = "Email Require !!";
            }
            if (empty($request->first_name) || empty($request->last_name) || empty($request->email)) {
                return response()->json([
                    'status' => 'validtion',
                    'firstnamemessage' => $firstnamemessage,
                    'lastnamemessage' => $lastnamemessage,
                    'emailmessage' => $emailmessage,
                ]);
            }
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $extension = $file->getClientOriginalExtension();
                $filename = Str::random(10) . '.' . $extension;
                Storage::disk('public')->putFileAs('avatar', $file, $filename);
            } else {
                $userDetail = User::where('id', $request->profile_id)->first()->avatar;
                $filename = $userDetail;
            }
            User::where('id', $request->profile_id)->update([
                'first_name'     => $request->first_name,
                'last_name'     => $request->last_name,
                'email'    => $request->email,
                'avatar' => $filename,
            ]);
            $user = User::where('id', $request->profile_id)->first();
            return response()->json([
                'user'  => $user,
                'status' => 'success',
                'message' => 'User Profile Sucessfully !!'
            ]);
        } catch (Exception $exception) {
            return response()->json(['message' => $exception->getMessage()]);
        }
    }
}
