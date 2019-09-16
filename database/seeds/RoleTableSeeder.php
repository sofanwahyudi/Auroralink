<?php

use App\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Traits\HasRoles;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    // Reset cached roles and permissions
    app()['cache']->forget('spatie.permission.cache');


    Role::create(['name' => 'user']);
    /** @var \App\User $user */
    $user = factory(\App\User::class)->create();

    $user->assignRole('user');
    Role::create(['name' => 'admin']);

    /** @var \App\User $user */
    $admin = factory(\App\User::class)->create([
        'username' => 'admin01',
        'name' => 'John Doe',
        'email' => 'john@example.com',
    ]);

    $admin->assignRole('admin');
    }
}
