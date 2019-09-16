<?php

use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'username' => '4dmin',
            'name' => 'admin',
            'email' => 'admin@auroralink.id',
            'password' => bcrypt('12345678')
        ]);

        $user->assignRole('admin');
    }
}
