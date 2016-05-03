<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Card;
use App\Note;

class NotesController extends Controller
{
    //
    public function store(Request $request, Card $card) {
        $note = new Note;
        $note->body = $request->body;
        $card->notes()->save($note);

        return back();
    }

    public function edit($card, $note){
        return view('cards.edit', compact('card', 'note'));
    }
}
