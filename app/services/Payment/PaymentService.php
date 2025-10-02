<?php

namespace App\Services\Payment;

use Exception;
use App\Services\AppService;
use App\Models\Table\PaymentTable;
use App\Services\AppServiceInterface;
use Illuminate\Pagination\LengthAwarePaginator;

class PaymentService extends AppService implements AppServiceInterface
{

    public function __construct(PaymentTable $model)
    {
        parent::__construct($model);
    }

    public function dataTable($filter)
    {
        return PaymentTable::datatable($filter)->paginate($filter->entries ?? 15);
    }

    public function index()
    {
        $users = PaymentTable::all();
        return $users;
    }

    public function getById($id)
    {
        return PaymentTable::findOrFail($id);
    }

    public function create($data)
    {
        return PaymentTable::create($data);
    }

    public function update($id, $data)
    {
        $row = PaymentTable::findOrFail($id);
        $row->update($data);
        return $row;
    }

    public function delete($id)
    {
        $row = PaymentTable::findOrFail($id);
        $row->delete();
        return $row;
    }

}
