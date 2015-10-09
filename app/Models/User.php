<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    public $timestamps = false;
    protected $guarded = [];

    public function groups()
    {
        return $this->hasMany('App\Models\UserGroup');
    }

    public function groupRelations()
    {
        return $this->hasMany(UserGroup::class);
    }

    public function getFullNameAttribute()
    {
        return $this->attributes['first_name'].' '.$this->attributes['last_name'];
    }
}
