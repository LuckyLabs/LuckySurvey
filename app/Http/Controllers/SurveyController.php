<?php
/**
 * @author: Vitaliy Ofat <v.ofat@lucky-labs.com>
 */

namespace App\Http\Controllers;

use App\Models\Survey;
use App\Models\UserSurvey;
use Illuminate\Http\Request;
use Symfony\Component\Finder\Exception\AccessDeniedException;

class SurveyController extends Controller
{
    public function view(Request $request, $surveyId, $userId, $token)
    {
        $userSurvey = UserSurvey
            ::where('survey_id', '=', $surveyId)
            ->where('user_id', '=', $userId)
            ->where('token', '=', $token)
            ->where('is_completed', '=', 0)
            ->first();

        if(!$userSurvey)
            throw new \Exception('You are not allowed to see this page');

        $survey = Survey::find($surveyId);
        if(!$survey || strtotime($survey->expiration_date) < time())
            throw new \Exception('You are not allowed to see this page');

        return view('survey', compact('survey'));
    }
}