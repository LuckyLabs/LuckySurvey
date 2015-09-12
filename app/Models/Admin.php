<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    public $timestamps = false;

    public function permissions()
    {
        return $this->hasMany('App\AdminPermission');
    }
}
