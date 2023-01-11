<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;

class HomeController extends Controller{
public function index(){
    return redirect()->route('admin.login');
}
public function welcome(){
    return view('home');
}
}
