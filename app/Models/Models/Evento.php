<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    public function salas(){
        return $this->belongsTo('App\Models\Models\Sala');
        return $this->belongsTo('App\User');
    }
}
