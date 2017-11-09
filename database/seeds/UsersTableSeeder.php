<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User;
        $user->name = 'usuario';
        $user->last_name = 'administrador';
        $user->email = 'admin@mail.com';
        $user->password = 'admin';
        $user->status = 1; // (1) active (0)disabled
        $user->save();

        $user->assignRole('admin');

    }
}
