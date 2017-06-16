<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\Auth\UserLogin;
use App\Services\Auth\WebAuthService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * @var WebAuthService
     */
    private $webAuthService;

    /**
     * AuthController constructor.
     * @param WebAuthService $webAuthService
     */
    public function __construct(WebAuthService $webAuthService)
    {
        $this->webAuthService = $webAuthService;
    }


    public function login()
    {
        return view('auth.login');
    }

    public function doLogin(UserLogin $request)
    {
        $isSignedIn = $this->webAuthService->signIn($request);
        if($isSignedIn){
            return redirect()->route('dashboard.main')->with('success','Welcome back!');
        }
        return redirect()->back()->with('error','Invalid Email/Password.');
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout()
    {
        if(Auth::check()){
            Auth::logout();
            return redirect()->route('web.login')->with('success','You have now been signed out.');
        }
        return redirect()->route('web.login')->with('error','You need to login first.');
    }
}
