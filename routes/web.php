
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\GiftController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProfileController;


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

Route::get('/login', [UserAuthController::class, 'index'])->name('login');
Route::post('/user-login', [UserAuthController::class, 'userLogin'])->name('userLogin');
Route::get('/registration', [UserAuthController::class, 'registration'])->name('registration');
Route::post('/user-registration', [UserAuthController::class, 'userRegistration'])->name('userRegistration');
Route::get('/user-signout', [UserAuthController::class, 'signout'])->name('signout');

Route::resource('/accueil', GiftController::class)->middleware('auth')->except('show');
Route::resource('/accueil/commentaires', CommentController::class)->middleware('auth')->except('show');
Route::resource('/accueil/mon-profil', ProfileController::class)->middleware('auth')->except('show');