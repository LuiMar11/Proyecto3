<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
