<?php

namespace App\Services\Ticket;

use Exception;
use App\Services\AppService;
use App\Models\Table\TicketTable;
use App\Services\AppServiceInterface;
use Illuminate\Pagination\LengthAwarePaginator;

class TicketService extends AppService implements AppServiceInterface
{

    public function __construct(TicketTable $model)
    {
        parent::__construct($model);
    }

    public function dataTable($filter)
    {
        return TicketTable::datatable($filter)->paginate($filter->entries ?? 15);
    }

    public function index()
    {
        $users = TicketTable::all();
        return $users;
    }

    public function getById($id)
    {
        return TicketTable::findOrFail($id);
    }

    public function create($data)
    {
        return TicketTable::create($data);
    }

    public function update($id, $data)
    {
        $row = TicketTable::findOrFail($id);
        $row->update($data);
        return $row;
    }

    public function delete($id)
    {
        $row = TicketTable::findOrFail($id);
        $row->delete();
        return $row;
    }

}
