<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdminPermission extends Model
{
    public $timestamps = false;

    public function group()
    {
        return $this->belongsTo('App\Models\Group');
    }

    public function admin()
    {
        return $this->belongsTo('App\Models\Admin');
    }
}