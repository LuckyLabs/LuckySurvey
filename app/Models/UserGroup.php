<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserGroup extends Model
{
    public $timestamps = false;
    protected $guarded = [];

    public function group()
    {
        return $this->belongsTo(Group::class);
    }
}
