<?php
/**
 * @var App\Models\Survey $survey
 */
?>
@extends('layouts.frontend')

@section('title')
    {{ $survey->title }}
@stop

@section('content')
<div class="container">

    <div class="fs-form-wrap" id="fs-form-wrap">
        <div class="fs-title">
            <img src="/frontend/img/logo.png" alt="">
            <h1><?=$survey->title?></h1>
            <p>
                <?=$survey->description?>
            </p>
        </div>
        <form id="myform" action="/survey/save" class="fs-form fs-form-full" autocomplete="off">
            <ol class="fs-fields">
                <?php foreach($survey->questions as $question):?>
                <?php if($question->type == \App\Models\Question::TYPE_SIMPLE):?>
                    <li data-input-trigger>
                        <label class="fs-field-label fs-anim-upper" for="q3" <?=$question->description ? 'data-info="'.$question->description.'"' : ''?>>
                        <?=$question->title?>:</label>
                        <div class="fs-checkbox-group clearfix fs-anim-lower">
                            <?php foreach($question->answers as $answer):?>
                            <div class="fs-checkbox__item">
                                <input type="radio" name="question[<?=$question->id?>]" id="answer-<?=$answer->id?>">
                                <label for="answer-<?=$answer->id?>"><span></span><?=$answer->text?></label>
                            </div>
                            <?php endforeach ?>
                        </div>
                    </li>
                <?php elseif($question->type == \App\Models\Question::TYPE_MULTIPLE):?>
                    <li data-input-trigger>
                        <label class="fs-field-label fs-anim-upper" for="q3" <?=$question->description ? 'data-info="'.$question->description.'"' : ''?>>
                            <?=$question->title?>:</label>
                        <div class="fs-checkbox-group clearfix fs-anim-lower">
                            <?php foreach($question->answers as $answer):?>
                            <div class="fs-checkbox__item">
                                <input type="checkbox" name="question[<?=$question->id?>]" id="answer-<?=$answer->id?>">
                                <label for="answer-<?=$answer->id?>"><span></span><?=$answer->text?></label>
                            </div>
                            <?php endforeach ?>
                        </div>
                    </li>
                <?php endif ?>
                <?php endforeach ?>
            </ol><!-- /fs-fields -->
            <button class="fs-submit" type="submit">Отправить ответы</button>
        </form><!-- /fs-form -->
    </div><!-- /fs-form-wrap -->

</div><!-- /container -->
<script src="/frontend/js/classie.js"></script>
<script src="/frontend/js/selectFx.js"></script>
<script src="/frontend/js/fullscreenForm.js"></script>
<script>
    (function() {
        var formWrap = document.getElementById( 'fs-form-wrap' );

        [].slice.call( document.querySelectorAll( 'select.cs-select' ) ).forEach( function(el) {
            new SelectFx( el, {
                stickyPlaceholder: false,
                onChange: function(val){
                    document.querySelector('span.cs-placeholder').style.backgroundColor = val;
                }
            });
        } );

        new FForm( formWrap, {
            onReview : function() {
                classie.add( document.body, 'overview' ); // for demo purposes only
            }
        } );
    })();
</script>
@stop

