@extends('layout')

@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <h3>Edit Note</h3>
            <form action="" method="POST">
                <div class="form-group">
                    <textarea class="form-control"id="" name="body">{{ App\Card::find($card)->notes->where('id', $note)->body }}</textarea>
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
