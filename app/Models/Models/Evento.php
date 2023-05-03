<?php

namespace App\Models\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    public function salas(){
        return $this->belongsTo('App\Models\Models\Sala');

    }
    public  function materiales(){
        return $this->belongsToMany(Materiales::class,'evento_materiales', 'eventos_id', 'materiales_id');
}

public function users(){
    return $this->belongsTo(User::class,'user_id', 'name');
}
    public function materialesEvento()
    {
        return $this->belongsToMany(Materiales::class, 'evento_materiales', 'eventos_id', 'materiales_id')
            ->withPivot('cantidad');
    }
}
