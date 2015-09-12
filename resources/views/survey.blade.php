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
<?=$survey->title?>
<?=$survey->description?>
<?php foreach($survey->questions as $question):?>

<?php endforeach ?>
@stop