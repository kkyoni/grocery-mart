<?php

namespace App\Http\Controllers\Admin\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Session\Session;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;
    protected $redirectTo = '/admin/dashboard';
    protected $authLayout = 'admin.auth.';
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function showLoginForm()
    {
        return view($this->authLayout . 'login');
    }
    public function login(Request $request)
    {
        if (\Auth::attempt(['email'     => $request->get('email'), 'password'  => $request->get('password'), 'status'    => 'active',])) {
            if (!empty($request->has('remmeber'))) {
                $email_cookie = $request->email;
                $password_cookie = $request->password;
                setcookie("email_cookie", $email_cookie, time() + 3600, '/');
                setcookie("password_cookie", $password_cookie, time() + 3600, '/');
            } else {
                if (isset($_COOKIE['email_cookie'])) {
                    setcookie("email_cookie", "", time() + 3600, '/');
                }
                if (isset($_COOKIE['password_cookie'])) {
                    setcookie("password_cookie", "", time() + 3600, '/');
                }
            }
            $remember_me = $request->has('remmeber') ? true : false;
            $loginAttempt = Auth::attempt(['email' => $request->get('email'), 'password' => $request->get('password')], $remember_me);
            if (Auth::user()->user_type == 'superadmin') {
                smilify('success', 'Welcome to Grocery Mart  🔥 !');
                return redirect()->route('admin.dashboard');
            } else {
                Auth::logout();
                smilify('error', 'User Not Found 🔥 !');
                return redirect()->route('admin.login');
            }
        } else {
            return $this->sendFailedLoginResponse($request, 'auth.failed_status');
        }
    }
    public function logout()
    {
        Auth::logout();
        smilify('success', 'Grocery Mart Admin Panel Logout. 🔥 !');
        return redirect()->route('admin.login');
    }
}
