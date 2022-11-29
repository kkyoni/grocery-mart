<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function getproduct(Request $request){
        try{
            $product = Product::with('Category')->orderBy('id','desc')->get();
            if($product){
                return response()->json([
                    'product'  => $product,
                    'status' => 'success',
                    'message' => 'Product Listed Successfully !!'
                    ]);
            }else{
                return response()->json([
                    'status' => 'error',
                    'message' => 'Product Record Not Successfully !!'
                    ]);
            }


        }catch (\Exception $e){
            return [
            'value'  => [],
            'status' => 'error',
            'message'   => $e->getMessage()
            ];
        }
    }
    public function productdetail(Request $request,$id){
        try{
            $productdetail = Product::with('Category')->where('id',$id)->first();

            return response()->json([
                'productdetail'  => $productdetail,
                'status' => 'success',
                'message' => 'Product Detail Listed Successfully !!'
                ]);

        }catch (\Exception $e){
            return [
            'value'  => [],
            'status' => 'error',
            'message'   => $e->getMessage()

            ];
        }
    }
}
