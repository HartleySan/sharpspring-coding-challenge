<?php

    use Illuminate\Support\Facades\Route;

    Route::get('/', 'UserController@index');
    Route::post('/log-in', 'UserController@logIn');
    Route::get('/log-out', 'UserController@logOut');

    Route::middleware(['AuthUser'])->group(function () {
        Route::get('/notes', 'NotesController@index');
        Route::get('/notes/create', 'NotesController@create');
        Route::post('/notes', 'NotesController@store');
        Route::get('/notes/{id}/edit', 'NotesController@edit');
        Route::patch('/notes/{id}', 'NotesController@update');
        Route::delete('/notes/{id}', 'NotesController@delete');
    });