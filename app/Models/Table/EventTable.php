<?php

namespace App\Models\Table;

use App\Models\Entity\Event;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class EventTable extends Event
{
    public function user(): BelongsTo
    {
        return $this->belongsTo(UserTable::class);
    }

    public function tickets(): HasMany
    {
        return $this->hasMany(TicketTable::class, 'event_id', 'id');
    }
}
