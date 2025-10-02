<?php

namespace App\Services\Booking;

use Exception;
use App\Services\AppService;
use App\Models\Table\BookingTable;
use App\Services\AppServiceInterface;
use Illuminate\Pagination\LengthAwarePaginator;

class BookingService extends AppService implements AppServiceInterface
{

    public function __construct(BookingTable $model)
    {
        parent::__construct($model);
    }

    public function dataTable($filter)
    {
        return BookingTable::datatable($filter)->paginate($filter->entries ?? 15);
    }

    public function index()
    {
        $users = BookingTable::all();
        return $users;
    }

    public function getById($id)
    {
        return BookingTable::findOrFail($id);
    }

    public function create($data)
    {
        return BookingTable::create($data);
    }

    public function update($id, $data)
    {
        $row = BookingTable::findOrFail($id);
        $row->update($data);
        return $row;
    }

    public function delete($id)
    {
        $row = BookingTable::findOrFail($id);
        $row->delete();
        return $row;
    }

}
