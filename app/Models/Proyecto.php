<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Proyecto extends Model
{
    use HasFactory;

    public function director()
    {
        return $this->belongsTo(Docente::class, 'id_director');
    }

    public function evaluador()
    {
        return $this->belongsTo(Docente::class, 'id_evaluador');
    }

    public function estudiantes()
    {
        return $this->belongsTo(Estudiante::class, [
            'id_estudiante1',
            'id_estudiante2',
            'id_estudiante3',
        ]);
    }

    public static function crearCodigo($proyecto)
    {
        $fecha = Carbon::createFromDate($proyecto->inicio)->format('Ymd');
      
        if ($proyecto->modalidad == 'Monografia') {
            $modalidad = 'M';
        } elseif ($proyecto->modalidad == 'Práctica') {
            $modalidad = 'P';
        } elseif ($proyecto->modalidad == 'Emprendimiento') {
            $modalidad = 'E';
        } elseif ($proyecto->modalidad == 'Proyecto Investigación') {
            $modalidad = 'PI';
        } elseif ($proyecto->modalidad == 'Desarrollo Tecnologico') {
            $modalidad = 'DT';
        } elseif ($proyecto->modalidad == 'Seminario') {
            $modalidad = 'S';
        }

        $proyecto->codigo = $fecha . $modalidad . $proyecto->id;
        $proyecto->save();
    }
}
