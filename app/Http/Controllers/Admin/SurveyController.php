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
                'authour_id',
                'created_at',
                'expired_at',
                'is_anon',
                [
                    'name' => 'actions',
                    'label' => 'Actions',
                    'callback' => function($value, DataRow $row){

                        $deleteUrl = '/admin/survey/delete/' . $row->getCellValue('id');
                        $deleteLink = "<a class='btn btn-danger' href='$deleteUrl'><i class='glyphicon glyphicon-trash'></i>&nbsp;Delete</a>";

                        return "<div class='btn-group'>$deleteLink/div>";
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

    public function postSave()
    {

    }
}