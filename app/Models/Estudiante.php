<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    use HasFactory;

    public function proyecto()
    {
        return $this->hasMany(Proyecto::class);
    }

    public function pago()
    {
        return $this->hasOne(Pago::class);
    }

    public function notas()
    {
        return $this->hasOne(Notas::class);
    }
}
