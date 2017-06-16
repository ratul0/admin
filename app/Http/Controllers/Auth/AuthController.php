<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\Auth\UserLogin;
use App\Services\Auth\WebAuthService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
        return $request->all();
    }
}
