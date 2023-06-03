<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndicesController;

Route::get('/tjsp', [IndicesController::class, 'indiceTjsp'])->name('tjsp');

Route::get('/', function(){
    return view('welcome');
});
