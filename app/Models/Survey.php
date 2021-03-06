<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    public $timestamps = false;
    protected $guarded = [];

    public function questions()
    {
        return $this->hasMany('App\Models\Question');
    }
}
