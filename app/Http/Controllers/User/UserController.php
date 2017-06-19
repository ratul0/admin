<?php

namespace App\Http\Controllers\User;

use App\Services\UserService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * @var UserService
     */
    private $userService;

    /**
     * UserController constructor.
     * @param UserService $userService
     */
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index()
    {
        $users = $this->userService->getFilterWithPaginatedData([]);
        return view('users.index')->with('users',$users);
    }

    public function destroy($id)
    {
        try{
            $this->userService->delete($id);
            return redirect()->route('users.index')->with('success','User Deleted Successfully');
        }catch (\Exception $exception){
            return redirect()->route('users.index')->with('error','Something went wrong. Try again');
        }
    }
}
