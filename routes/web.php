<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Authentication;
use App\Http\Controllers\EventContoller;
use App\Http\Middleware\SessionCheck;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
	return view('index');
})->middleware(SessionCheck::class);

Route::get('/events/gal', function () {
	return view('gal');
});

Route::get('/events', [EventContoller::class, "index"])->middleware(SessionCheck::class);
Route::post('/events', [EventContoller::class, "create"])->middleware(SessionCheck::class);
Route::get('/events/{id}', [EventContoller::class, "destroy"])->middleware(SessionCheck::class);
Route::get('/events/{id}/edit', [EventContoller::class, "update"])->middleware(SessionCheck::class);


Route::get('/auth/login', [Authentication::class, "login_view"]);
Route::post('/login', [Authentication::class, "login"]);
Route::get('/auth/logout', [Authentication::class, "logout"]);
