<?php

namespace Database\Seeders;

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
        $role1 = Role::create(['name' => 'Admin']);
        $role2 = Role::create(['name' => 'Comite']);
        $role3 = Role::create(['name' => 'Estudiante']);
        $role4 = Role::create(['name' => 'Docente']);

        Permission::create(['name' => 'docentes.index'])->syncRoles([$role1, $role2, $role3, $role4]);
        Permission::create(['name' => 'docentes.show'])->syncRoles([$role1, $role2, $role4]);
        Permission::create(['name' => 'docentes.create'])->syncRoles([$role1, $role2, $role4]);
        Permission::create(['name' => 'docentes.edit'])->syncRoles([$role1, $role2, $role4]);
        Permission::create(['name' => 'docentes.delete'])->assignRole($role1);

        Permission::create(['name' => 'estudiantes.index'])->syncRoles([$role1, $role2, $role3, $role4]);
        Permission::create(['name' => 'estudiantes.create'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'estudiantes.edit'])->syncRoles([$role1, $role2, $role4]);
        Permission::create(['name' => 'estudiantes.delete'])->assignRole($role1);

        Permission::create(['name' => 'proyectos.index'])->syncRoles([$role1, $role2, $role3, $role4]);
        Permission::create(['name' => 'proyectos.show'])->syncRoles([$role1, $role2, $role3, $role4]);
        Permission::create(['name' => 'proyectos.create'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'proyectos.edit'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'proyectos.delete'])->assignRole($role1);
    }
}
