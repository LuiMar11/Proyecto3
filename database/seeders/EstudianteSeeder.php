<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class EstudianteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for ($i = 0; $i < 15; $i++) {
            DB::table('estudiantes')->insert(
                array(
                    'id'         => $i + 1,
                    'cedula'     => $faker->unique()->randomNumber(9, true),
                    'nombre'     => $faker->firstName($gender = 'male' | 'female'),
                    'apellido'   => $faker->lastName(),
                    'genero'     => $faker->randomElement(['Femenino', 'Masculino']),
                    'email'      => $faker->unique()->email,
                    'telefono'   => $faker->randomNumber(9, true),
                    'programa'   => $faker->randomElement(['Gestión Empresarial', 'Administración de Empresas', 'Otro']),
                    'estado'     => $faker->randomElement(['Activo', 'Graduado']),
                )
            );
        }
    }
}
