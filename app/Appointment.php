<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{

  public $timestamps = false;

  public function doctor() {
    return $this->belongsTo(Doctor::class);
  }

  public function user() {
    return $this->belongsTo(User::class);
  }
}
