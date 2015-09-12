@extends('layouts.backend')

@section('content')
    @if(isset($title))
        <h1>{!! $title !!}</h1><hr>
    @endif
    @if(isset($links))
        @foreach($links as $url => $label)
            <a class="btn btn-info" href="{!! $url !!}">{!! $label !!}</a>
        @endforeach
        <br>
    @endif

    {!! $grid !!}
@stop