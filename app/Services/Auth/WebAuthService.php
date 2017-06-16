<?php
/**
 * Created by PhpStorm.
 * User: vivacom
 * Date: 6/8/17
 * Time: 11:37 AM
 */

namespace App\Services\Auth;


use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WebAuthService
{
    /**
     * @var UserService
     */
    private $userService;

    /**
     * WebAuthService constructor.
     * @param UserService $userService
     */
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * @param $request
     * @return bool
     */
    public function signIn($request)
    {
        return Auth::attempt($this->getCredentials($request),$request->has('remember'));
    }

    /**
     * @param Request $request
     * @return array
     */
    private function getCredentials(Request $request)
    {
        return [
            'email' => $request->input('email'),
            'password' => $request->input('password')
        ];
    }
}