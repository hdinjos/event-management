<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Authentication;

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
});

Route::get('/events/gal', function () {
	return view('gal');
});

Route::get('/events', function () {
	return view('dashboard/event');
});

Route::get('/auth/login', [Authentication::class, "login_view"]);
Route::post('/login', [Authentication::class, "login"]);
