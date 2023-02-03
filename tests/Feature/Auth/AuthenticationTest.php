<?php

use App\Models\User;
use Illuminate\Support\Facades\Artisan;

it('test_users_can_authenticate_with_correct_credentials', closure: function () {
    Artisan::call('db:seed --class="UserTableSeeder"');

    $user = User::first();

    $this
        ->post('/api/login', [
            'email' => $user->email,
            'password' => 'password',
        ])
        ->assertStatus(201);
});

it('test_users_can_not_authenticate_with_invalid_password', closure: function () {
    Artisan::call('db:seed --class="UserTableSeeder"');

    $user = User::first();

    $this->post('/api/login', [
        'email' => $user->email,
        'password' => 'wrong-password',
    ]);

    $this->assertGuest();
});

it('test_users_can_not_authenticate_with_invalid_email', closure: function () {
    $this->post('/api/login', [
        'email' => 'wrong-email@mail.com',
        'password' => 'password',
    ]);

    $this->assertGuest();
});
