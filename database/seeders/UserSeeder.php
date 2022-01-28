<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'nombre'      => 'Administrador',
            'apellido' => 'Admin',
            'permisos' => 'Admin',
            'email'     => 'adminsiap@uts.edu.co',
            'password'  => bcrypt('123456789'),
        ]);
        $admin->assignRole('Admin');

        $comite = User::create([
            'nombre'      => 'Comite',
            'apellido' => 'C',
            'permisos' => 'comite',
            'email'     => 'comiteadmon@uts.edu.co',
            'password'  => bcrypt('123456789'),
        ]);
        $comite->assignRole('Comite');

    }
}
