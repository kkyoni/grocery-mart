<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index(Request $request){
        try{
            $faq = Faq::where('status','active')->orderBy('id','desc')->get();
            if($faq){
                return response()->json([
                    'faq'  => $faq,
                    'status' => 'success',
                    'message' => 'Faq Listed Successfully !!'
                    ]);
            }else{
                return response()->json([
                    'status' => 'error',
                    'message' => 'Faq Record Not Successfully !!'
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
}
