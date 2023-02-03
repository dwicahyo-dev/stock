<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name' => 'User 1',
                'email' => 'user@mail.com',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'User 2',
                'email' => 'user2@mail.com',
                'password' => Hash::make('password'),
            ],
        ];

        User::insert($data);
    }
}
