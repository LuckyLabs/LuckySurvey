<?php
View::addExtension('dot','php');
?>

@extends('layouts.backend')

@section('title')
    Create Survey
@stop

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h3 class="page-header">Create Survey</h3>
            <?=Form::open(['route' => 'admin.survey.save', 'method' => 'post'])?>
            <div class="form-group">
                <label for="inputTitle">Title</label>
                <?=Form::text('survey[title]', $model->title, ['class' => 'form-control', 'id' => 'inputTitle'])?>
            </div>
            <div class="form-group">
                <label for="inputDescription">Description</label>
                <?=Form::textarea('survey[description]', $model->description, ['class' => 'form-control', 'id' => 'inputDescription', 'rows' => 5])?>
            </div>
            <div class="form-group">
                <label for="inputMailDescription">Mail Description
                    <small>(optional)</small>
                </label>
                <?=Form::textarea('survey[mail_description]', $model->mail_description, ['class' => 'form-control', 'id' => 'inputMailDescription', 'rows' => 5])?>
                <div class="help-block">
                    Describe your survey and send it by e-mail
                </div>
            </div>
            <div class="form-group">
                <label for="inputExpiredAt">Expires</label>
                <?=Form::textarea('survey[expiration_date]', $model->expiration_date, ['class' => 'form-control', 'id' => 'inputDescription', 'rows' => 5])?>
            </div>
            <div class="checkbox">
                <label for="inputIsAnon">
                    <?=Form::checkbox('survey[is_anon]', $model->is_anon, false)?>
                    Is Anonymous
                </label>
            </div>
            <h4 class="page-header">Questions</h4>
            <div id="questionsList">
            <?php foreach($questions as $k=>$question):?>
            <div class="panel panel-default question" data-id="<?=$k?>">
                <div class="panel-body">
                    <a href="#" class="close">&times;</a>

                    <div class="form-group">
                        <label>Title</label>
                        <?=Form::text('question[' . $k . '][title]', $question->title, ['class' => 'form-control'])?>
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <?=Form::textarea('question[' . $k . '][description]', $question->description, ['class' => 'form-control', 'rows' => 2])?>
                    </div>
                    <div class="form-group">
                        <label>Type</label>
                        <?=Form::select('question[' . $k . '][type]', [
                                \App\Models\Question::TYPE_SIMPLE => 'One Answer',
                                \App\Models\Question::TYPE_MULTIPLE => 'Multiple Answers',
                                \App\Models\Question::TYPE_ORDER => 'Reorder Answers',
                        ], $question->type, ['class' => 'form-control'])?>
                    </div>
                    <h5 class="page-header">
                        Answers
                    </h5>
                    <div class="answersList">
                    <?php foreach($question->answers as $i=>$answer):?>
                    <div class="form-group answer">
                        <div class="input-group">
                            <?=Form::text('question[' . $k . '][answer][' . $i . '][text]', $question->text, ['class' => 'form-control'])?>
                            <span class="input-group-btn">
                                <a href="#" class="btn btn-warning">&times;</a>
                            </span>
                        </div>
                    </div>
                    <?php endforeach ?>
                    </div>
                    <hr>
                    <a href="#" class="btn btn-sm btn-info addAnswer">Add Answer</a>
                </div>
            </div>
            <?php endforeach ?>
            </div>
            <a href="#" class="btn btn-sm btn-info" id="addQuestion">Add Question</a>
            <hr>
            <button type="submit" class="btn btn-primary">Save</button>
            <?=Form::close()?>
        </div>
    </div>
@stop

@section('scripts')
<script type="text/x-dot-template" id="questionTemplate">
    @include('admin.survey.question')
</script>
<script type="text/x-dot-template" id="answersTemplate">
    @include('admin.survey.answer')
</script>
<script src="/admin_theme/js/doT.min.js"></script>
<script src="/admin_theme/js/survey.form.js"></script>
@stop