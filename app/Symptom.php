<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Symptom extends Model
{
    
    public function diseases()
    {
        return $this->belongsToMany('App\Disease', 'symptom_disease');
    }
}
