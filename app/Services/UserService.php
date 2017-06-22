<?php
/**
 * Created by PhpStorm.
 * User: vivacom
 * Date: 6/1/17
 * Time: 5:54 PM
 */

namespace App\Services;


use App\BaseSettings\Settings;
use App\Repositories\UserRepository;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserService extends BaseService
{
    /**
     * @var UserRepository
     */
    private $userRepository;

    /**
     * UserService constructor.
     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function saveUser(Request $request)
    {
        $password = bcrypt('123456');
        $request->merge(['password' => $password]);
        $data = $request->only(['name','email','password']);
        $user =  $this->userRepository->create($data);
        $user->assignRole(Settings::$client_role);
        return $user;
    }

    public function delete($id)
    {
        DB::beginTransaction();
        try{
            DB::table('model_has_roles')->where('model_id',$id)->delete();
            DB::table('model_has_permissions')->where('model_id',$id)->delete();
            $status =  $this->userRepository->delete($id);
            DB::commit();
            return $status;
        }catch (\Exception $exception){
            DB::rollBack();
        }
    }


    /**
     * return Repository instance
     *
     * @return mixed
     */
    public function baseRepository()
    {
        return $this->userRepository;
    }

    public function updateUser(User $user, Request $request)
    {
        $data = $request->only(['name']);

        return $this->userRepository->update($data,$user->id);
    }
}