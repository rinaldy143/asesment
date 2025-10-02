<?php

namespace App\Models\Table;

use App\Models\Entity\Event;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class EventTable extends Event
{
    public function user(): BelongsTo
    {
        return $this->belongsTo(UserTable::class);
    }
}
