<?php

use App\Http\Controllers\AnnonceController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//GET
Route::get('/', [IndexController::class, 'showIndex']);
Route::get('/register', [UserController::class, 'show'])
    ->middleware('guest');
Route::get('/login', [UserController::class, 'login'])
    ->middleware('guest');
Route::get('/logout', [Usercontroller::class, 'logout']);
Route::get('/profil', [UserController::class, 'profile']);
Route::get('/adverts', [AnnonceController::class, 'index']);
Route::get('/createAdvert', [AnnonceController::class, 'show']);
Route::get('/myAdverts/', [AnnonceController::class, 'myAdverts']);



//POST
Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'authenticate']);
Route::post('/profil/updatePassword', [UserController::class, 'passwordUpdate'])
    ->name('updatePassword');
Route::post('/profil/updateEmail', [UserController::class, 'infoUpdate'])
    ->name('infoUpdate');
Route::post('/advert/createAdvert', [AnnonceController::class, 'createAdvert'])
    ->name('createAdvert');
Route::post('/advert/myAdverts/{id}', [AnnonceController::class, 'deleteAdvert'])
    ->name('mydAverts');

