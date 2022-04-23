<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->createUser();
        $this->createAdmin();
    }

    private function createUser()
    {
        $user = User::firstOrNew([
            'email' => 'user@email.com'
        ]);

        $user->fill([
            'name' => 'User',
            'email' => 'user@email.com',
            'password' => Hash::make('123456'),
            'phone' => '(42)99999-9999',
            'email_verified_at' => '2019-11-23 01:01:01',
            'thumbnail' => 'default.jpg',
        ]);

        $user->save();

        if (!$user->hasRole(\App\Enums\UserRolesEnum::CLIENT)) {
            $user->assignRole(\App\Enums\UserRolesEnum::CLIENT);
        }
    }

    private function createAdmin()
    {
        $user = User::firstOrNew([
            'email' => 'admin@email.com'
        ]);

        $user->fill([
            'name' => 'Admin',
            'email' => 'admin@email.com',
            'password' => Hash::make('123456'),
            'phone' => '(42)99999-9999',
            'email_verified_at' => '2019-11-23 01:01:01',
            'thumbnail' => 'default.jpg'
        ]);

        $user->save();

        if (!$user->hasRole(\App\Enums\UserRolesEnum::ADMIN)) {
            $user->assignRole(\App\Enums\UserRolesEnum::ADMIN);
        }
    }
}
