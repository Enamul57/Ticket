<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');
//admin
Route::prefix('admin')->controller(AdminController::class)->group(function() {
    Route::get('/login', 'login_page')->name('admin.loginPage')->middleware('redirectAuth');
    Route::get('/register', 'register_page')->name('admin.registerPage')->middleware('redirectAuth');
    Route::post('/register', 'register')->name('admin.register')->middleware('redirectAuth');
    Route::get('/dashboard','dashboard')->name('admin.dashboard');
    Route::post('/logout','logout')->name('admin.logout');
    route::post('/login','login')->name('admin.login')->middleware('redirectAuth');
});
//user
Route::prefix('user')->controller(UserController::class)->group(function() {
    Route::get('/login', 'login_page')->name('user.loginPage')->middleware('redirectAuth');
    Route::get('/register', 'register_page')->name('user.registerPage')->middleware('redirectAuth');
    Route::post('/register', 'register')->name('user.register')->middleware('redirectAuth');
    Route::get('/dashboard','dashboard')->name('user.dashboard');
    Route::post('/logout','logout')->name('user.logout');
    route::post('/login','login')->name('user.login')->middleware('redirectAuth');
});

Route::middleware('auth')->controller(TicketController::class)->group(function(){
    Route::post('/ticket','store')->name('ticket.store');
    Route::get('/ticket','index')->name('ticket.index');
    Route::get('/ticket/{ticket}','show')->name('ticket.edit');
    Route::put('/ticket/{id}','update')->name('ticket.update');
    Route::get('/mail/{id}','mail')->name('ticket.mail');

});