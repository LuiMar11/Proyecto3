<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Docente extends Model
{
    use HasFactory;

    public function proyectoDir(){
        return $this->hasMany(Proyecto::class);
    }

    public function proyectoEva(){
        return $this->hasMany(Proyecto::class);
    }
}
