<?php
/**
 * @author: Vitaliy Ofat <v.ofat@lucky-labs.com>
 */

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AnswerVariant;
use App\Models\Question;
use App\Models\Survey;

class SurveyController extends Controller
{
    public function getIndex()
    {
        return view('admin.survey.list');
    }

    public function getCreate()
    {
        $model = new Survey();
        $question = new Question();
        $question->answers = [
            new AnswerVariant()
        ];
        $questions = [
            $question
        ];
        return view('admin.survey.form', ['model' => $model, 'questions' => $questions]);
    }

    public function postSave()
    {

    }
}