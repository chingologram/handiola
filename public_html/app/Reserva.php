<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use User;
class Reserva extends Model
{
  public function user(){
       return $this->belongsTo('App\User');
      }
}
