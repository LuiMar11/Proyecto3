<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'path',
        'id_estudiante'
    ];

    public function estudiantes(){
        return $this->belongsTo(Estudiante::class, 'id_estudiante');
    }
}
