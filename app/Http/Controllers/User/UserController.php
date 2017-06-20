<?php

namespace App\Http\Controllers\User;

use App\Http\Requests\User\UserCreate;
use App\Services\UserService;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Rashidul\RainDrops\Facades\FormBuilder;

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

    public function create()
    {
       $user = new User();
        $form = FormBuilder::build($user)->form([
            'action' => 'users',
            'method' => 'POST'
        ])->render();
        return view('users.form',compact('form'));
    }

    public function store(UserCreate $request)
    {

        try{
            $user = $this->userService->saveUser($request);
            return redirect()->route('users.index')->with('success','User Created Successfully');
        }catch (\Exception $exception){
            return redirect()->route('users.index')->with('error','Something went wrong. Try Again.');
        }
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
