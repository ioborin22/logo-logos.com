<?php

use App\Http\Controllers\IndexController;
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

Route::get('/',[IndexController::class, 'index'])->name('index');
Route::view('copyright-and-dmca.html', 'copyright-and-dmca');
Route::match(['get', 'post'],'contact-form.html',[IndexController::class, 'contact']);


Route::get('/category/{slug}',[IndexController::class, 'showCategory']);
Route::get('/{slug}',[IndexController::class, 'showLogo']);
