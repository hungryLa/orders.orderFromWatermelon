<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Furniture;
use App\Models\Order;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Админ',
            'email' => 'admin@mail.ru',
            'password' => Hash::make('password'),
        ]);
        Order::factory(10)->create();
        Furniture::factory(7)->create();
    }
}
