<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\PageController;
use App\Http\Middleware\ValidedUser;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function(){
    return view('auth.login');
});

Route::get('/index', [EventController::class, 'index'])->middleware(ValidedUser::class)->name('index');
Route::get('/welcome', [PageController::class, 'welcome'])->name('welcome');

Route::get('/register', [PageController::class, 'routeRegister'])->name('rRegister');
Route::post('/register', [FormController::class, 'register'])->name('register');

Route::get('/login', [PageController::class, 'routeLogin'])->name('rLogin');
Route::post('/login', [FormController::class, 'login'])->name('login');

Route::get('/logout', [FormController::class, 'logout'])->name('logout');

Route::post('/welcome', [FormController::class, 'event'])->name('event');

Route::get('/edit/{id}', [EventController::class, 'edit'])->name('editEvent');
Route::post('/update/{id}', [EventController::class, 'update'])->name('eventUpdate');

Route::post('/delete/{id}', [EventController::class, 'delete'])->name('delete');