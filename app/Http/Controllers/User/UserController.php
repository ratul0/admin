<?php

namespace App\Http\Controllers\User;

use App\Http\Requests\User\UserCreate;
use App\Services\UserService;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Rashidul\RainDrops\Facades\DataTable;
use Rashidul\RainDrops\Facades\FormBuilder;
use Rashidul\RainDrops\Table\DataTableTransformer;
use Yajra\Datatables\Datatables;

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
        $table = DataTable::of(new User())
            ->setUrl(route('datatables.users'))
            ->setId('user-table')
            ->render();

        return view('users.index', compact('table'));

//        $users = $this->userService->getFilterWithPaginatedData([]);
//        return view('users.index-old')->with('users',$users);
    }

    public function tableData(Datatables $datatables)
    {
        $query = User::select();

        return $datatables->eloquent($query)
            ->setTransformer(new DataTableTransformer())
            ->make(true);
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

    public function edit($id)
    {
        try{
            $user = $this->userService->find($id);
            $form = FormBuilder::build($user)->form([
                'action' => 'users/',
                'method' => 'POST'
            ])->render();
            return view('users.form',compact('form'));
        }catch (\Exception $exception){

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
