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

    public function login(Request $request)
    {
        return $request->all();
    }
}