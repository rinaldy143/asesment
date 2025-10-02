<?php

namespace App\Models\Table;

use App\Models\Entity\Payment;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class PaymentTable extends Payment
{
    public function booking(): BelongsTo
    {
        return $this->belongsTo(BookingTable::class);
    }
}
