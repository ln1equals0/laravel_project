<?php

namespace App\Http\Controllers;

use App\Card;
use App\Http\Requests;
use DB;
use Illuminate\Http\Request;

class CardsController extends Controller
{
    public function index(){
        // $cards = DB::table('cards')->get();
        $cards = Card::all();
        return view('cards.index', compact('cards'));
    }
    public function show(Card $card){
        return view('cards.show', compact('card'));
    }
}
