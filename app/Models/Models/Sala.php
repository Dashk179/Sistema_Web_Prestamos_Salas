<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sala extends Model
{
  public function eventos(){
      return $this->hasMany('App\Models\Models\Evento','salas_id');
  }

    public  function materiales(){
        return $this->belongsToMany(Materiales::class,'material_salas', 'salas_id', 'materiales_id');
    }
    public function materialesSalas()
    {
        return $this->belongsToMany(Materiales::class, 'material_salas', 'salas_id', 'materiales_id')
            ->withPivot('cantidad');
    }

}
