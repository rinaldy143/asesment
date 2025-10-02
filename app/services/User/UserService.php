<?php

namespace App\Services\User;

use Exception;
use App\Services\AppService;
use App\Models\Table\UserTable;
use App\Services\AppServiceInterface;

class UserService extends AppService implements AppServiceInterface
{

    public function __construct(UserTable $model)
    {
        parent::__construct($model);
    }

    public function dataTable($filter)
    {
        return UserTable::datatable($filter)->paginate($filter->entries ?? 15);
    }

    public function index()
    {
        $users = UserTable::all();
        return $users;
    }

    public function getById($id)
    {
        return UserTable::findOrFail($id);
    }

    public function create($data)
    {
        return UserTable::create($data);
    }

    public function update($id, $data)
    {
        $row = UserTable::findOrFail($id);
        $row->update($data);
        return $row;
    }

    public function updatePassword($email, $data){
        $row = UserTable::where('email', $email)->first();
        $this->update($row->id, $data);
    }

    public function delete($id)
    {
        $row = UserTable::findOrFail($id);
        $row->delete();
        return $row;
    }

   public function userInfo($type)
    {
        if ($type === 'all') {
            return UserTable::count();
        }

        return UserTable::where('status', $type)->count();
    }

    public function checkMail($email){
        $row = UserTable::where('email',$email)->first();
        if ($row !== null) {
            return true;
        }else{
            return false;
        }
    }
}
