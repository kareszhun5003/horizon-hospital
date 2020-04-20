<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
  public function user() {
    return $this->belongsTo(User::class);
  }

  public function appointment() {
    return $this->hasOne(Appointment::class);
  }

}
