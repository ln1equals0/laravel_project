<?php

use Illuminate\Support\Facades\Redis;

Route::get('/', function () {
	return view('welcome');
});

Route::get('cards', 'CardsController@index');

Route::get('cards/{card}', 'CardsController@show');

Route::get('cards/{card}/note/{note}/edit', 'NotesController@edit');

