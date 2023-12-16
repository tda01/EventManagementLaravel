<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SpeakerController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\TicketController;




/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!

*/

Route::get('/', [EventController::class, 'index']);
Route::resource('speakers', SpeakerController::class);
Route::resource('partners', PartnerController::class);
Route::resource('events', EventController::class);
Route::resource('tickets', TicketController::class);
