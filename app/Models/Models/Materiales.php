<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materiales extends Model
{
    public  function eventos(){
        return $this->belongsToMany(Evento::class,'evento_materiales', 'materiales_id', 'eventos_id');
    }

    public  function salas(){
        return $this->belongsToMany(Sala::class,'material_salas', 'materiales_id', 'salas_id');
    }

}
