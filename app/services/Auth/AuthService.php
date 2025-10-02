<?php

namespace App\Services\Auth;

use App\Models\Entity\Role;
use App\Models\Table\UserTable;
use App\Services\AppService;
use Illuminate\Support\Facades\Auth;
use Exception;
use Illuminate\Support\Facades\Hash;

class AuthService extends AppService
{
    public function __construct(UserTable $model)
    {
        parent::__construct($model);
    }

    /**
     * Login user with email and password
     *
     * @param $data
     * @return object
     * @throws Exception
     */
    public function login($data)
    {
        if (!Auth::attempt(['email' => $data->email, 'password' => $data->password])) {
            throw new Exception('Credentials not match', 401);
        }

        $user = Auth::user();
        $user = UserTable::findOrFail($user->id);

        if(!$user->status){
            throw new Exception('Account is inactive', 401);
        }
        $user['token'] = $user->createToken('API Token')->plainTextToken;

        return $user;
    }

    /**
     * Register new user
     *
     * @param $data
     * @return object
     */
    public function register($data)
    {
        // $user = UserTable::create([
        //     'name'      => $data['name'],
        //     'email'     => $data['email'],
        //     'password'  => Hash::make($data['password']),
        //     'fms_token' => $fmsToken ?? null,
        // ]);

        // $user['token'] = $user->createToken('API Token')->plainTextToken;
        // return $user;
    }

    /**
     * Get authenticated user
     *
     * @return object
     */
    public function profile()
    {
        // $user = Auth::user();
        // $user->makeHidden('userRole');
        // $role = Role::where('id', $user->userRole->role_id)->first();
        // $rolePermissions   = $role->permissions()->select(['id', 'name', 'group_name'])->get()->toArray();
        // $directPermissions = $user->permissions()->select(['id', 'name', 'group_name'])->get()->toArray();
        // $permissions = array_merge($rolePermissions, $directPermissions);

        // $groupName = [];
        // $addedGroups = [];
        // foreach ($permissions as $permission) {
        //     $temp = [];
        //     $temp['group_name'] = $permission['group_name'];
        //     if (!in_array(current($temp), $addedGroups)) {
        //         $groupName[] = $temp;
        //         $addedGroups[] = current($temp);
        //     }
        //     foreach ($groupName as $keyGroup => $group) {
        //         if ($group['group_name'] == current($temp)) {
        //             $groupName[$keyGroup]['permissions'][] = $permission['name'];
        //         }
        //     }
        // }
        // $user['permissions'] = $groupName;

        // return $user;
    }

    /**
     * Logout authenticated user
     *
     * @return object
     */
    public function logout()
    {
        $user = Auth::user();
        $user->currentAccessToken()->delete();

        return $user;
    }
}
