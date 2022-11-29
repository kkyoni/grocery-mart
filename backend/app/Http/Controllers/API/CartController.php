<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use Auth;

class CartController extends Controller{
    public function getcart(Request $request,$id){
        try{
            $cart = Cart::with('Product','Product.Category')->where('user_id',$id)->orderBy('id','desc')->get();
            if($cart){
                return response()->json(['cart'  => $cart,'status' => 'success','message' => 'cart Listed Successfully !!']);
            }else{
                return response()->json(['status' => 'error','message' => 'cart Record Not Successfully !!']);
            }
        }catch (\Exception $e){
            return ['value'  => [],'status' => 'error','message'   => $e->getMessage()];
        }
    }

    public function addcart(Request $request){
        try{
            $data = [
                'product_id' => $request->product_id,
                'user_id' => $request->user_id,
                'quantity' => $request->quantity,
                'price' => $request->price,
                'total_price' => $request->price,
            ];
            $cart = Cart::create($data);
            return response()->json(['status' => 'success','message' => 'Cart Added Sucessfully !!','product_id' => $request->product_id]);
        }catch (\Exception $e){
            return ['value'  => [],'status' => 'error','message'   => $e->getMessage()];
        }
    }
}
