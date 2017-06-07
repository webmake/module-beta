<?php

Route::get('/beta', function(){
    return response()->json(config('module_beta.text'));
})->name('beta');
