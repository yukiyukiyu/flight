<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Passenger extends Model
{
    public function user()
    {
        return $this->hasOne('App\User');
    }
}
