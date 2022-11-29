<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class SliderController extends Controller
{
    public function index(Request $request){
        try{
            $slider = Slider::where('status','active')->orderBy('id','desc')->get();

            return response()->json([
                'slider'  => $slider,
                'status' => 'success',
                'message' => 'Slider Listed Successfully !!'
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
