<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = Role::create(['name' => 'Administrador']);
        $role2 = Role::create(['name' => 'Usuario']);

        Permission::create(['name' => 'persons.index'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'persons.create'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'persons.edit'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'persons.show'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'persons.destroy'])->syncRoles([$role1, $role2]);

        Permission::create(['name' => 'transactions.index'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'transactions.create'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'transactions.edit'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'transactions.show'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'transactions.destroy'])->syncRoles([$role1, $role2]);

        Permission::create(['name' => 'projects.index'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'projects.create'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'projects.edit'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'projects.show'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'projects.destroy'])->syncRoles([$role1, $role2]);
    }
}
