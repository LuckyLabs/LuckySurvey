<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class UserSurvey
 * @package App\Models
 *
 * @property User $user
 * @property Survey $survey
 */
class UserSurvey extends Model
{
    public $timestamps = false;
    protected $guarded = [];

    const MAILED = 1;
    const NOT_MAILED = 0;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function survey()
    {
        return $this->belongsTo(Survey::class);
    }

    public function getLink()
    {
        return route('survey.view', [
            $this->survey_id,
            $this->user_id,
            $this->token
        ]);
    }
}
