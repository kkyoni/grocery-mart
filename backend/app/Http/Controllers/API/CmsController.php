<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Cms;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CmsController extends Controller
{
    public function getabout(Request $request){
        try{
            $about = Cms::where('title','about_us')->first();
            if($about){
                return response()->json([
                    'about'  => $about,
                    'status' => 'success',
                    'message' => 'About Listed Successfully !!'
                    ]);
            }else{
                return response()->json([
                    'status' => 'error',
                    'message' => 'About Record Not Successfully !!'
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
