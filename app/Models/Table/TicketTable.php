<?php

namespace App\Models\Table;

use App\Models\Entity\Ticket;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class TicketTable extends Ticket
{
    public function event(): BelongsTo
    {
        return $this->belongsTo(EventTable::class);
    }

    public function bookings(): HasMany
    {
        return $this->hasMany(BookingTable::class, 'booking_id', 'id');
    }
}
