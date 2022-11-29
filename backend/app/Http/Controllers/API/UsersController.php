<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Jobs\sendNotification;
use Illuminate\Http\Request;
use App\Notifications\PasswordResetRequest;
use App\Helpers\GlobalH;
use App\Models\Blog;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Exceptions\JWTException;
use App\Models\User;
use App\Models\Brand;
use App\Models\Categories;
use App\Models\Otp;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Tymon\JWTAuth\Facades\JWTAuth;
use Ixudra\Curl\Facades\Curl;
use Carbon\Carbon;
use Event;
use PushNotification;
use Twilio\Rest\Client;
use Twilio\Exceptions\TwilioException;
use DateTime;
use DateTimeZone;
use Illuminate\Support\Facades\Log;

class UsersController extends Controller
{

    public function __construct()
    {
    }
    public function getAuthenticatedUser()
    {
        try {
            if (!$user = JWTAuth::parseToken()->authenticate()) {
                return response()->json(['user_not_found'], 404);
            }
        } catch (Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {
            return response()->json(['token_expired'], $e->getStatusCode());
        } catch (Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {
            return response()->json(['token_invalid'], $e->getStatusCode());
        } catch (Tymon\JWTAuth\Exceptions\JWTException $e) {
            return response()->json(['token_absent'], $e->getStatusCode());
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
                $data['user'] = $userTypeCheck;
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
                    // $text = 'Your OTP is: '.$otpNumber;
                    // $emailcontent = array (
                    // 	'text' => $text,
                    // 	'title' => 'Thanks for join Grocery Mart - Ecommerce, Please use Below OTP for Complete SignUp Process. You will need to complete Sign Up Process enter OTP.',
                    // 	'userName' => $checkContactNumInUser->first_name
                    // 	);
                    // $details['email'] = $checkContactNumInUser->email;
                    // $details['username'] = $checkContactNumInUser->first_name;
                    // $details['subject'] = 'OTP Confirmation';
                    // dispatch(new sendNotification($details,$emailcontent));
                    // $data['otpNumber'] = $otpNumber;
                }
                // sent otp code
                return response()->json(['status' => 'success', 'message' => 'Login successfully', 'data' => $data], 200);
            }
        } catch (Exception $e) {
            return response()->json(['status' => 'error', 'message' => 'Something went Wrong.....', 'data' => (object)[]], 200);
        }
    }

    /*
|--------------------------------------------------------------------------
| Send Otp
|--------------------------------------------------------------------------
|
*/
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
                dispatch(new sendNotification($details, $emailcontent));
            } else {
                return response()->json(['status' => 'error', 'message' => 'Mobile number does not exist.']);
            }
            return response()->json(['status' => 'success', 'message' => 'Otp sent successfully', 'data' => $otpNumber]);
        } catch (\Exception $exception) {
            return response()->json(['message' => $exception->getMessage()]);
        }
    }

    /*
|--------------------------------------------------------------------------
| Verify Otp
|--------------------------------------------------------------------------
|
*/
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
        } catch (\Exception $exception) {
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
        } catch (\Exception $e) {
            return [
                'value'  => [],
                'status' => 'error',
                'message'   => $e->getMessage()
            ];
        }
    }

    public function getbrand(Request $request)
    {
        try {
            $brand = Brand::orderBy('id', 'desc')->get();
            if ($brand) {
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
        } catch (\Exception $e) {
            return [
                'value'  => [],
                'status' => 'error',
                'message'   => $e->getMessage()
            ];
        }
    }

    public function getcategories(Request $request)
    {
        try {
            $categories = Categories::orderBy('id', 'desc')->get();
            if ($categories) {
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
        } catch (\Exception $e) {
            return [
                'value'  => [],
                'status' => 'error',
                'message'   => $e->getMessage()
            ];
        }
    }

    public function getblog(Request $request)
    {
        try {
            $blog = Blog::orderBy('id', 'desc')->get();
            if ($blog) {
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
        } catch (\Exception $e) {
            return [
                'value'  => [],
                'status' => 'error',
                'message'   => $e->getMessage()
            ];
        }
    }

    public function singlecategorys(Request $request, $id)
    {
        try {
            $product = Product::with(['productimage'])->where('categories_id', $request->id)->get();
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
        } catch (\Exception $e) {
            return [
                'value'  => [],
                'status' => 'error',
                'message'   => $e->getMessage()
            ];
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
        } catch (\Exception $e) {
            return [
                'value'  => [],
                'status' => 'error',
                'message'   => $e->getMessage()
            ];
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
        } catch (\Exception $e) {
            return [
                'value'  => [],
                'status' => 'error',
                'message'   => $e->getMessage()
            ];
        }
    }

    public function productssingle(Request $request, $id)
    {
        try {
            $productsdetail = Product::with(['productimage'])->where('id', $id)->first();
            return response()->json([
                'productsdetail'  => $productsdetail,
                'status' => 'success',
                'message' => 'Products Detail Listed Successfully !!'
            ]);
        } catch (\Exception $e) {
            return [
                'value'  => [],
                'status' => 'error',
                'message'   => $e->getMessage()
            ];
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
        } catch (\Exception $e) {
            return [
                'value'  => [],
                'status' => 'error',
                'message'   => $e->getMessage()
            ];
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
        } catch (\Exception $e) {
            return [
                'value'  => [],
                'status' => 'error',
                'message'   => $e->getMessage()
            ];
        }
    }
}
