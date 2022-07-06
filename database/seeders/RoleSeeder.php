<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    public function run()
    {
        $role1 = Role::create(['name' => 'Administrador']);
        $role2 = Role::create(['name' => 'Modelo']);

        Permission::create(['name' => 'dashboard'])->syncRoles([$role1, $role2]);

        Permission::create(['name' => 'admin.users.index'])->assignRole($role1);
        Permission::create(['name' => 'admin.users.create'])->assignRole($role1);
        Permission::create(['name' => 'admin.users.edit'])->assignRole($role1);
        Permission::create(['name' => 'admin.users.update'])->assignRole($role1);
        Permission::create(['name' => 'admin.users.destroy'])->assignRole($role1);

        Permission::create(['name' => 'admin.events.index'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.events.create'])->assignRole($role1);
        Permission::create(['name' => 'admin.events.edit'])->assignRole($role1);
        Permission::create(['name' => 'admin.events.destroy'])->assignRole($role1);

        Permission::create(['name' => 'admin.reports.index'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.reports.create'])->assignRole($role2);
        Permission::create(['name' => 'admin.reports.edit'])->assignRole($role2);
        Permission::create(['name' => 'admin.reports.destroy'])->assignRole($role1);

        Permission::create(['name' => 'admin.tags.index'])->assignRole($role1);
        Permission::create(['name' => 'admin.tags.create'])->assignRole($role1);
        Permission::create(['name' => 'admin.tags.edit'])->assignRole($role1);
        Permission::create(['name' => 'admin.tags.destroy'])->assignRole($role1);

        
    }
}
