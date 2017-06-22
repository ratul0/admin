<?php

namespace App\Http\Controllers\User;

use App\Http\Requests\User\RoleCreate;
use App\Models\Role;
use App\Services\RoleService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Rashidul\RainDrops\Facades\DataTable;
use Rashidul\RainDrops\Facades\FormBuilder;
use Rashidul\RainDrops\Table\DataTableTransformer;
use Yajra\Datatables\Datatables;

class RoleController extends Controller
{
    /**
     * @var RoleService
     */
    private $roleService;

    /**
     * RoleController constructor.
     * @param RoleService $roleService
     */
    public function __construct(RoleService $roleService)
    {
        $this->roleService = $roleService;
    }

    public function index()
    {
        $table = DataTable::of(new Role())
            ->setUrl(route('datatables.roles'))
            ->setId('role-table')
            ->render();

        return view('roles.index', compact('table'));
    }

    public function tableData(Datatables $datatables)
    {
        $query = Role::select();

        return $datatables->eloquent($query)
            ->setTransformer(new DataTableTransformer())
            ->make(true);
    }

    public function create()
    {
        $role = new Role();
        $form = FormBuilder::build($role)->form([
            'action' => 'roles',
            'method' => 'POST'
        ])->render();
        return view('roles.form',compact('form'));
    }

    public function store(RoleCreate $request)
    {

        try{
            $role = $this->roleService->saveRole($request);
            return redirect()->route('roles.index')->with('success','Role Created Successfully');
        }catch (\Exception $exception){
            return redirect()->route('roles.index')->with('error','Something went wrong. Try Again.');
        }
    }
}
