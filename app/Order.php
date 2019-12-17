<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function flight()
    {
        return $this->belongsTo('App\Flight');
    }
}
