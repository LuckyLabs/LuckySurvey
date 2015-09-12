@extends('layouts.backend')

@section('content')
    <?php
    if (isset($title)) {
        echo "<h1>$title</h1><hr>";
    }
    ?>
    <?= $grid ?>
@stop