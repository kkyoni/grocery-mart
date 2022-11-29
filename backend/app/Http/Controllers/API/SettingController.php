<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
class SettingController extends Controller
{
    public function sitelogo(Request $request){
        try{
            $setting = Setting::where('code','site_logo')->first();
            if($setting){
                return response()->json([
                    'setting'  => $setting,
                    'status' => 'success',
                    'message' => 'setting Listed Successfully !!'
                    ]);
            }else{
                return response()->json([
                    'status' => 'error',
                    'message' => 'setting Record Not Successfully !!'
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
