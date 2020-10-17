<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => "Admin",
            'email' => "admin@gmail.com",
            'password' => Hash::make('adminadmin')
        ]);

        $role = Role::firstOrcreate(['name'=>'Admin']);
        $role->syncPermissions(Permission::all(['id'])->toArray());
        $user->assignRole($role);
    }
}
