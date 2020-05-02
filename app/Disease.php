<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Disease extends Model
{
    

    public function symptoms()
    {
        return $this->belongsToMany('App\Symptom', 'symptom_disease');
    }
}
