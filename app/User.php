<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    public function roleWord()
    {
        if ($this->role == 0) {
            return '管理员';
        }

        return '旅客';
    }
}
