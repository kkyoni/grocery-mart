<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ChatController extends Controller
{
    public function getchat(Request $request){
        try{
            $chat = User::where('user_type','!=','superadmin')->orderBy('id','desc')->get();
            if($chat){
                return response()->json(['chat'  => $chat,'status' => 'success','message' => 'chat Listed Successfully !!']);
            }else{
                return response()->json(['status' => 'error','message' => 'chat Record Not Successfully !!']);
            }
        }catch (\Exception $e){
            return ['value'  => [],'status' => 'error','message'   => $e->getMessage()];
        }
    }
}
