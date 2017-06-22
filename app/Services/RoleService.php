<?php
/**
 * Created by PhpStorm.
 * User: vivacom
 * Date: 6/22/17
 * Time: 9:45 AM
 */

namespace App\Services;


use App\Models\Role;
use Illuminate\Http\Request;

class RoleService
{

    public function saveRole(Request $request)
    {
        $data = $request->only(['name']);
        return Role::create($data);
    }
}