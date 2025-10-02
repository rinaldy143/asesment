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
}
