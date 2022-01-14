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
            'nombre'      => 'L',
            'apellido' => 'G',
            'permisos' => 'Admin',
            'email'     => 'adminsiap@uts.edu.co',
            'password'  => bcrypt('123456789'),
        ]);
        $admin->assignRole('Admin');

        $comite = User::create([
            'nombre'      => 'A',
            'apellido' => 'H',
            'permisos' => 'comite',
            'email'     => 'comiteadmon@uts.edu.co',
            'password'  => bcrypt('123456789'),
        ]);
        $comite->assignRole('Comite');

        $estudiante = User::create([
            'nombre'      => 'L',
            'apellido' =>'L',
            'permisos' => 'Estudiante' ,
            'email'     => 'estudiante@uts.edu.co',
            'password'  => bcrypt('123456789'),
        ]);
        $estudiante->assignRole('Estudiante');

        $docente = User::create([
            'nombre' => 'J',
            'apellido' =>'K',
            'permisos' => 'Docente',
            'email' => 'docente@uts.edu.co',
            'password'  => bcrypt('123456789'),
        ]);
        $docente->assignRole('Docente');
    }
}
