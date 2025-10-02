<?php

namespace App\Services\User;

use Exception;
use App\Services\AppService;
use App\Models\Table\EventTable;
use App\Services\AppServiceInterface;
use Illuminate\Pagination\LengthAwarePaginator;

class UserService extends AppService implements AppServiceInterface
{

    public function __construct(EventTable $model)
    {
        parent::__construct($model);
    }

    public function dataTable($filter)
    {
        return EventTable::datatable($filter)->paginate($filter->entries ?? 15);
    }

    public function index()
    {
        $users = EventTable::all();
        return $users;
    }

    public function getById($id)
    {
        return EventTable::findOrFail($id);
    }

    public function create($data)
    {
        return EventTable::create($data);
    }

    public function update($id, $data)
    {
        $row = EventTable::findOrFail($id);
        $row->update($data);
        return $row;
    }

    public function delete($id)
    {
        $row = EventTable::findOrFail($id);
        $row->delete();
        return $row;
    }

}
