<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sala extends Model
{
  public function eventos(){
      return $this->hasMany('App\Models\Evento');
  }
}
