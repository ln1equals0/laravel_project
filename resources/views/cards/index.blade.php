@extends('layout')

@section('content')
    <h1>Cards shows here</h1>

    @foreach($cards as $card)
        <div>
            <a href="cards/{{ $card->id }}">{{ $card->title }}</a>
        </div>
    @endforeach
@stop

@section('footer')

@stop
