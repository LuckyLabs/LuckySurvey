<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    public $timestamps = false;
    protected $guarded = [];

    public function groupRelations()
    {
        return $this->hasMany(UserGroup::class);
    }
}
