<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notas extends Model
{
    use HasFactory;

    public function estudiante(){
        return $this->belongsTo(Estudiante::class, 'id_estudiante');
    }
}
