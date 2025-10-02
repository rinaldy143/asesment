<?php

namespace App\Models\Table;

use App\Models\Entity\User;
use Illuminate\Database\Eloquent\Relations\HasMany;


class UserTable extends User
{
    public function events(): HasMany
    {
        return $this->hasMany(EventTable::class, 'user_id', 'id');
    }

    public function bookings(): HasMany
    {
        return $this->hasMany(BookingTable::class, 'user_id', 'id');
    }

    // public function payments(): HasMany
    // {
    //     return $this->hasMany(PaymentTable::class, 'user_id', 'id');
    // }
}
