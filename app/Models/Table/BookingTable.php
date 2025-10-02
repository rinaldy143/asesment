<?php

namespace App\Models\Table;

use App\Models\Entity\Booking;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class BookingTable extends Booking
{
    public function user(): BelongsTo
    {
        return $this->belongsTo(UserTable::class);
    }

    public function ticket(): BelongsTo
    {
        return $this->belongsTo(TicketTable::class);
    }

    public function payment(): HasOne
    {
        return $this->hasOne(PaymentTable::class);
    }
}
