@extends('layouts.backend')

@section('content')
    @if(isset($title))
        <h1>{!! $title !!}</h1><hr>
    @endif
    @if(isset($links))
        <div class="pull-right">
        @foreach($links as $url => $label)
            <a class="btn btn-info" href="{!! $url !!}">{!! $label !!}</a>
        @endforeach
        </div>
    @endif

    {!! $grid !!}
@stop