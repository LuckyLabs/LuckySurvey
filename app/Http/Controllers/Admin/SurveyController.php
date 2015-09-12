<?php
/**
 * @author: Vitaliy Ofat <v.ofat@lucky-labs.com>
 */

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AnswerVariant;
use App\Models\Question;
use App\Models\Survey;
use Grids;
use Nayjest\Grids\DataRow;
use Illuminate\Http\Request;

class SurveyController extends Controller
{
    public function getIndex()
    {
        $grid = Grids::make([
            'src' => Survey::class,
            'columns' => [
                'id',
                'title',
                'description',
                'author_id',
                'created_at',
                'expiration_date',
                'is_anon',
                [
                    'name' => 'actions',
                    'label' => 'Actions',
                    'callback' => function($value, DataRow $row){

                        $deleteUrl = '/admin/survey/delete/' . $row->getCellValue('id');
                        $deleteLink = "<a class='btn btn-danger' href='$deleteUrl'><i class='glyphicon glyphicon-trash'></i>&nbsp;Delete</a>";

                        return "<div class='btn-group'>$deleteLink</div>";
                    }
                ]
            ]
        ])->render();
        $title = 'Survey Management';
        $links = [
            '/admin/survey/create' => "<i class='glyphicon glyphicon-plus'></i>&nbsp;New Survey",
        ];
        return view('admin.default.grid-page', compact('grid', 'title', 'links'));
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

    public function postSave(Request $request)
    {
        $questions = $request->input('question');
        $survey = $request->input('survey');
        \DB::transaction(function() use ($questions, $survey) {
            $surveyRecord = Survey::create([
                'title' => $survey['title'],
                'description' => $survey['description'],
                'mail_description' => $survey['mail_description'] ? $survey['mail_description'] : $survey['description'],
                'author_id' => 1,//\Auth::user()->id,
                'expiration_date' => $survey['expiration_date'],
                'is_anon' => $survey['is_anon']
            ]);
            foreach($questions as $question)
            {
                $questionRecord = Question::create([
                    "title" => $question['title'],
                    "description" => $question['description'],
                    "type" => $question['type'],
                    "survey_id" => $surveyRecord->id
                ]);
                foreach($question['answer'] as $answer)
                {
                    AnswerVariant::create([
                        'question_id' =>$questionRecord->id,
                        'text' => $answer['text']
                    ]);
                }
            }
        });

        return \Redirect::action('Admin\SurveyController@getIndex');
    }
}