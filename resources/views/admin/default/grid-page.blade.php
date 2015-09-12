@extends('layouts.backend')

@section('content')
    <?php
    if (isset($title)) {
        echo "";
    }
    ?>
    <?= $grid ?>
@stop