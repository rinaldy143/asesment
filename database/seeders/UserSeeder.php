<?php

namespace Database\Seeders;

use App\Models\Table\UserTable;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        UserTable::updateOrCreate([
            "email" => "admin@gmail.com"
        ], [
            "id"       => "00000001-0000-0000-0000-000000000001",
            'name'     => 'Rinaldi',
            'role'     => 'admin',
            'phone'     => '01234567890',
            'password' => Hash::make('1234qwer'),
        ]);
    }
}
