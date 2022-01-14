<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class DocenteSeeder extends Seeder
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
            DB::table('docentes')->insert(
                array(
                    'id'          => $i + 1,
                    'cedula'      => $faker->unique()->randomNumber(9, true),
                    'nombre'      => $faker->firstName($gender = 'male' | 'female'),
                    'apellido'    => $faker->lastName,
                    'genero'      => $faker->randomElement(['Femenino', 'Masculino']),
                    'email'       => $faker->unique()->email,
                    'nivel'       => $faker->randomElement(['PhD', 'Master']),
                    'contratacion' => $faker->randomElement(['Planta', 'Medio Tiempo', 'Tiempo Completo', 'Cátedra'])
                )
            );
        }
    }
}
