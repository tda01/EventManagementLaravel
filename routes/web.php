<?php

use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Auth;
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



Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('events', EventController::class)->except('events.create', 'events.store', 'events.edit', 'events.update', 'events.destroy');
Route::resource('tickets', TicketController::class)->except('tickets.create', 'tickets.store', 'tickets.edit', 'tickets.update', 'tickets.destroy');
//Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add/{id}', [CartController::class, 'addToCart'])->name('cart.addToCart');
Route::post('/cart/remove/{id}', [CartController::class, 'removeFromCart'])->name('cart.removeFromCart');
Route::post('/cart/update/{id}', [CartController::class, 'updateCart'])->name('cart.updateCart');





Route::middleware(['auth'])->group(function () {
    Route::get('/cart', [CartController::class, 'viewCart'])->name('cart.view');
    Route::post('/session', 'App\Http\Controllers\StripeController@session')->name('session');
    Route::get('/success', 'App\Http\Controllers\StripeController@success')->name('success');
});


Route::middleware('role:admin')->group(function () {
    Route::resource('speakers', SpeakerController::class);
    Route::resource('partners', PartnerController::class);
    Route::get('events/create', [EventController::class, 'create'])->name('events.create');
    Route::post('events/store', [EventController::class, 'store'])->name('events.store');
    Route::get('events/edit/{id}', [EventController::class, 'edit'])->name('events.edit');
    Route::patch('events/update/{id}', [EventController::class, 'update'])->name('events.update');
    Route::delete('events/destroy/{id}', [EventController::class, 'destroy'])->name('events.destroy');
    Route::get('tickets/create', [TicketController::class, 'create'])->name('tickets.create');
    Route::post('tickets/store', [TicketController::class, 'store'])->name('tickets.store');
    Route::get('tickets/edit/{id}', [TicketController::class, 'edit'])->name('tickets.edit');
    Route::patch('tickets/update/{id}', [TicketController::class, 'update'])->name('tickets.update');
    Route::delete('tickets/destroy/{id}', [TicketController::class, 'destroy'])->name('tickets.destroy');


});
