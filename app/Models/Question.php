<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Question
 * @package App\Models
 *
 * @property array $answers array
 */
class Question extends Model
{
    const TYPE_SIMPLE = 1;
    const TYPE_MULTIPLE = 2;
    const TYPE_ORDER = 3;

    public $timestamps = false;

    public function answers()
    {
        return $this->hasMany('App\Models\AnswerVariant');
    }
}
