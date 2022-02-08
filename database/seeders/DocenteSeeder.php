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

        //Planta   
        DB::table('docentes')->insert(
            array(
                'cedula' => 91298414,
                'nombre' => 'ANDRES MAURICIO ',
                'apellido' => 'GARCIA GOMEZ',
                'genero' => 'Masculino',
                'email' => 'agarcia@correo.uts.edu.co',
                'contratacion' => 'Planta'
            )
        );

        DB::table('docentes')->insert(
            array(
                'cedula' => 30329089,
                'nombre' => 'ALBA PATRICIA',
                'apellido' => 'GUZMAN DUQUE',
                'genero' => 'Femenino',
                'email' => 'aguzman@correo.uts.edu.co',
                'contratacion' => 'Planta'
            )
        );

        DB::table('docentes')->insert(
            array(
                'cedula' => 1095800532,
                'nombre' => 'EDWIN ANDRES',
                'apellido' => 'HERNANDEZ ALVAREZ',
                'genero' => 'Masculino',
                'email' => 'ehernandez@correo.uts.edu.co',
                'contratacion' => 'Planta'
            )
        );

        //Tiempo Completo
        DB::table('docentes')->insert(
            array(
                'cedula' => 91278823,
                'nombre' => 'MARIO RAMON',
                'apellido' => 'DURAN PEÑALOZA',
                'genero' => 'Masculino',
                'email' => 'mduran@correo.uts.edu.co',
                'contratacion' => 'Tiempo Completo'
            )
        );

        DB::table('docentes')->insert(
            array(
                'cedula' => 91265696,
                'nombre' => 'ALEJANDRO',
                'apellido' => 'BIANCHA HERNANDEZ',
                'genero' => 'Masculino',
                'email' => 'abiancha@correo.uts.edu.co',
                'contratacion' => 'Tiempo Completo'
            )
        );

        DB::table('docentes')->insert(
            array(
                'cedula' => 91486107,
                'nombre' => 'ALEXANDER',
                'apellido' => 'JAIMES POVEDA',
                'genero' => 'Masculino',
                'email' => 'ajaimes@correo.uts.edu.co',
                'contratacion' => 'Tiempo Completo'
            )
        );

        DB::table('docentes')->insert(
            array(
                'cedula' => 37827813,
                'nombre' => 'MARIA LILIANA',
                'apellido' => 'SANTAMARIA SARMIENTO',
                'genero' => 'Femenino',
                'email' => 'msantamaria@correo.uts.edu.co',
                'contratacion' => 'Tiempo Completo'
            )
        );

        DB::table('docentes')->insert(
            array(
                'cedula' => 1102350538,
                'nombre' => 'CLAUDYA MYLLETH',
                'apellido' => 'SANTANA FRANCO',
                'genero' => 'Femenino',
                'email' => 'claudiasantana@correo.uts.edu.co',
                'contratacion' => 'Tiempo Completo'
            )
        );

        DB::table('docentes')->insert(
            array(
                'cedula' => 91295266,
                'nombre' => 'SERGIO ENRIQUE',
                'apellido' => 'SUAREZ CEPEDA',
                'genero' => 'Masculino',
                'email' => 'sesuarez@correo.uts.edu.co',
                'contratacion' => 'Tiempo Completo'
            )
        );

        DB::table('docentes')->insert(
            array(
                'cedula' => 91472251,
                'nombre' => 'FRANKLIN DARIO',
                'apellido' => 'TORRES ARDILA',
                'genero' => 'Masculino',
                'email' => 'franklint@correo.uts.edu.co',
                'contratacion' => 'Tiempo Completo'
            )
        );

        DB::table('docentes')->insert(
            array(
                'cedula' => 91238292,
                'nombre' => 'REINALDO',
                'apellido' => 'RANGEL SANCHEZ',
                'genero' => 'Masculino',
                'email' => 'rrangel@correo.uts.edu.co',
                'contratacion' => 'Tiempo Completo'
            )
        );

        DB::table('docentes')->insert(
            array(
                'cedula' => 91251837,
                'nombre' => 'ALVARO',
                'apellido' => 'VALENCIA CALLE',
                'genero' => 'Masculino',
                'email' => 'avalencia@correo.uts.edu.co',
                'contratacion' => 'Tiempo Completo'
            )
        );

        DB::table('docentes')->insert(
            array(
                'cedula' => 19419981,
                'nombre' => 'ENRIQUE ALBERTO',
                'apellido' => 'GUERRERO GUZMAN',
                'genero' => 'Masculino',
                'email' => 'enriqueguerrero@correo.uts.edu.co',
                'contratacion' => 'Tiempo Completo'
            )
        );

        DB::table('docentes')->insert(
            array(
                'cedula' => 28411295,
                'nombre' => 'MYRIAM MERCEDEZ',
                'apellido' => 'CALA AMAYA',
                'genero' => 'Femenino',
                'email' => 'mi.cala@correo.uts.edu.co',
                'contratacion' => 'Tiempo Completo'
            )
        );

        DB::table('docentes')->insert(
            array(
                'cedula' => 1098660605,
                'nombre' => 'SANDRA MARCELA',
                'apellido' => 'PUENTES GOMEZ',
                'genero' => 'Femenino',
                'email' => 'spuentes@correo.uts.edu.co',
                'contratacion' => 'Tiempo Completo'
            )
        );

        DB::table('docentes')->insert(
            array(
                'cedula' => 91286059,
                'nombre' => 'LUIS EDUARDO',
                'apellido' => 'MORENO BAYONA',
                'genero' => 'Masculino',
                'email' => 'lmoreno@correo.uts.edu.co',
                'contratacion' => 'Tiempo Completo'
            )
        );

        DB::table('docentes')->insert(
            array(
                'cedula' => 1098734774,
                'nombre' => 'CRISTIAN CAMILO',
                'apellido' => 'RINCON MORENO',
                'genero' => 'Masculino',
                'email' => 'cristianr@correo.uts.edu.co',
                'contratacion' => 'Tiempo Completo'
            )
        );

        DB::table('docentes')->insert(
            array(
                'cedula' => 1098700840,
                'nombre' => 'JENNY PAOLA',
                'apellido' => 'RANGEL CHAVES',
                'genero' => 'Femenino',
                'email' => 'jrangelc@correo.uts.edu.co',
                'contratacion' => 'Tiempo Completo'
            )
        );


        DB::table('docentes')->insert(
            array(
                'cedula' => 63354530,
                'nombre' => 'LIGIA PATRICIA',
                'apellido' => 'MEZA RODRIGUEZ',
                'genero' => 'Femenino',
                'email' => 'lmezarodriguez@correo.uts.edu.co',
                'contratacion' => 'Tiempo Completo'
            )
        );

        DB::table('docentes')->insert(
            array(
                'cedula' => 37510726,
                'nombre' => 'MARGARITA',
                'apellido' => 'RAMIREZ MARIÑO',
                'genero' => 'Femenino',
                'email' => 'mramirez2@correo.uts.edu.co',
                'contratacion' => 'Tiempo Completo'
            )
        );

        DB::table('docentes')->insert(
            array(
                'cedula' => 13872407,
                'nombre' => 'ALFRED YOSET',
                'apellido' => 'FAJARDO CHAPARRO',
                'genero' => 'Masculino',
                'email' => 'afajardo@correo.uts.edu.co',
                'contratacion' => 'Tiempo Completo'
            )
        );

        DB::table('docentes')->insert(
            array(
                'cedula' => 91107627,
                'nombre' => 'RAFAEL HERNANDO',
                'apellido' => 'SUAREZ SUAREZ',
                'genero' => 'Masculino',
                'email' => 'rhsuarez@correo.uts.edu.co',
                'contratacion' => 'Tiempo Completo'
            )
        );

        DB::table('docentes')->insert(
            array(
                'cedula' => 28387459,
                'nombre' => 'ROSA EDILIA',
                'apellido' => 'TOLOZA SUAREZ',
                'genero' => 'Masculino',
                'email' => 'retoloza@correo.uts.edu.co',
                'contratacion' => 'Tiempo Completo'
            )
        );

        DB::table('docentes')->insert(
            array(
                'cedula' => 91266376,
                'nombre' => 'LUIS JAIME',
                'apellido' => 'SARMIENTO',
                'genero' => 'Masculino',
                'email' => 'lusarmiento@correo.uts.edu.co',
                'contratacion' => 'Tiempo Completo'
            )
        );

        DB::table('docentes')->insert(
            array(
                'cedula' => 88156937,
                'nombre' => 'JORGE VIRGILIO',
                'apellido' => 'RIVERA GUTIERREZ',
                'genero' => 'Masculino',
                'email' => 'jrivera@correo.uts.edu.co',
                'contratacion' => 'Tiempo Completo'
            )
        );

        DB::table('docentes')->insert(
            array(
                'cedula' => 63494013,
                'nombre' => 'ALIX ANDREA',
                'apellido' => 'GARCIA MANTILLA',
                'genero' => 'Femenino',
                'email' => 'alixgarcia@correo.uts.edu.co',
                'contratacion' => 'Tiempo Completo'
            )
        );

        DB::table('docentes')->insert(
            array(
                'cedula' => 91284283,
                'nombre' => 'FERNANDO',
                'apellido' => 'RUEDA VILLAMIZAR',
                'genero' => 'Masculino',
                'email' => 'frueda@correo.uts.edu.co',
                'contratacion' => 'Tiempo Completo'
            )
        );

        DB::table('docentes')->insert(
            array(
                'cedula' => 1098679520,
                'nombre' => 'TAIDE GISELLE',
                'apellido' => 'BOTELLO VELASCO',
                'genero' => 'Femenino',
                'email' => 'taide.botello@hotmail.com',
                'contratacion' => 'Tiempo Completo'
            )
        );

        DB::table('docentes')->insert(
            array(
                'cedula' => 91212224,
                'nombre' => 'SERGIO IVAN',
                'apellido' => 'PICON PERALTA',
                'genero' => 'Masculino',
                'email' => 'sipicon@correo.uts.edu.co',
                'contratacion' => 'Tiempo Completo'
            )
        );

        //Medio Tiempo
        DB::table('docentes')->insert(
            array(
                'cedula' => 37947532,
                'nombre' => 'MARIA ISABEL',
                'apellido' => 'PINZON PRADA',
                'genero' => 'Femenino',
                'email' => 'ma.pinzon@correo.uts.edu.co',
                'contratacion' => 'Medio Tiempo'
            )
        );

        DB::table('docentes')->insert(
            array(
                'cedula' => 60263885,
                'nombre' => 'DIANEY YAMILE',
                'apellido' => 'SANDOVAL VILLAMIZAR',
                'genero' => 'Femenino',
                'email' => 'dianeysandoval@correo.uts.edu.co',
                'contratacion' => 'Medio Tiempo'
            )
        );

        DB::table('docentes')->insert(
            array(
                'cedula' => 1098627209,
                'nombre' => 'FERNEY MAURICIO',
                'apellido' => 'BIANCHA ALMEYDA',
                'genero' => 'Masculino',
                'email' => 'fbiancha@correo.uts.edu.co',
                'contratacion' => 'Medio Tiempo'
            )
        );

        DB::table('docentes')->insert(
            array(
                'cedula' => 91472391,
                'nombre' => 'DIEGO MAURICIO',
                'apellido' => 'ROA MARTINEZ',
                'genero' => 'Masculino',
                'email' => 'droa381@unab.edu.co',
                'contratacion' => 'Medio Tiempo'
            )
        );

        DB::table('docentes')->insert(
            array(
                'cedula' => 91475735,
                'nombre' => 'ORLANDO',
                'apellido' => 'ARIAS VILLAMIZAR',
                'genero' => 'Masculino',
                'email' => 'ORLAV62@HOTMAIL.COM',
                'contratacion' => 'Medio Tiempo'
            )
        );

        DB::table('docentes')->insert(
            array(
                'cedula' => 37749336,
                'nombre' => 'FRANCY ANDREA',
                'apellido' => 'MANRIQUE LESMES',
                'genero' => 'Femenino',
                'email' => 'fmanrique580@unab.edu.co',
                'contratacion' => 'Medio Tiempo'
            )
        );

        DB::table('docentes')->insert(
            array(
                'cedula' => 1102720318,
                'nombre' => 'KAIRA PAOLA',
                'apellido' => 'CASTRO BAUTISTA',
                'genero' => 'Femenino',
                'email' => 'kaira.castro.bautista@gmail.com',
                'contratacion' => 'Medio Tiempo'
            )
        );

        DB::table('docentes')->insert(
            array(
                'cedula' => 91264219,
                'nombre' => 'LUIS NELSON',
                'apellido' => 'TABARES MEDINA',
                'genero' => 'Masculino',
                'email' => 'ltabares@correo.uts.edu.co',
                'contratacion' => 'Medio Tiempo'
            )
        );

        DB::table('docentes')->insert(
            array(
                'cedula' => 1099363686,
                'nombre' => 'WILLIAM ANTONIO',
                'apellido' => 'ROJAS ROJAS',
                'genero' => 'Masculino',
                'email' => 'williamantonio.1987@gmail.com',
                'contratacion' => 'Medio Tiempo'
            )
        );

        DB::table('docentes')->insert(
            array(
                'cedula' => 1098740818,
                'nombre' => 'ANDREA NATALIA',
                'apellido' => 'RAMIREZ VESGA',
                'genero' => 'Femenino',
                'email' => 'andrerv29@hotmail.com',
                'contratacion' => 'Medio Tiempo'
            )
        );

        DB::table('docentes')->insert(
            array(
                'cedula' => 91493736,
                'nombre' => 'CARLOS JAVIER',
                'apellido' => 'PINTO SUAREZ',
                'genero' => 'Masculino',
                'email' => 'cajapisu25@gmail.com',
                'contratacion' => 'Medio Tiempo'
            )
        );

        DB::table('docentes')->insert(
            array(
                'cedula' => 1098738043,
                'nombre' => 'CRISTIAN DAVID',
                'apellido' => 'GUTIERREZ ROJAS',
                'genero' => 'Masculino',
                'contratacion' => 'Medio Tiempo'
            )
        );

        DB::table('docentes')->insert(
            array(
                'cedula' => 63499503,
                'nombre' => 'RUBIELA',
                'apellido' => 'CAMACHO VARGAS',
                'genero' => 'Femenino',
                'email' => 'camarubi03@gmail.com',
                'contratacion' => 'Medio Tiempo'
            )
        );
    }
}
