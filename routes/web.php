<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userControllers;

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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::middleware(['custom.token.auth'])->group(function () {
    // Protected routes go here
    Route::get('/info', function () {
        return view('infoUser');
    });
});
Route::get('/', [userControllers::class, 'showLoginForm'])->name('login.form');
Route::post('/', [userControllers::class, 'login'])->name('login');

Route::get('/register', [userControllers::class, 'showCreateForm'])->name('register.form');
Route::post('/register', [userControllers::class, 'create'])->name('register');
Route::get('/about', function () {
    return view('about');
});
