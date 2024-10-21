<?php

use App\Http\Controllers\MeasureController;
use Illuminate\Support\Facades\Route;

Route::get('/', [MeasureController::class, 'result']);
Route::get('/generate', [MeasureController::class, 'index']);
// Route::get('/', function () {
//     return view('welcome');
// });
