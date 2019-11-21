<?php

Route::get('/', function () {
    return view('welcome', [
        'contacts' => \App\Contact::all(),
    ]);
});
