@extends('layout')

@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <h1>{{ $card->title }}</h1>
            <ul class="list-group">
                @foreach($card->notes as $note)
                    <li class="list-group-item"><a href="/cards/{{ $card->id }}/note/{{ $note->id }}/edit">{{ $note->body }}</a></li>
                @endforeach
            </ul>
            <hr>

            <h3>Add a New Note</h3>
            <form action="/cards/{{ $card->id }}/note" method="POST">
                <div class="form-group">
                    <textarea class="form-control"id="" name="body"></textarea>
                </div>

                <div class="row">
                    <div class="col-md-3 col-md-offset-9">
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="Add Note">
                        </div>
                    </div>
                </div>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
            </form>
        </div>
    </div>
@stop
