<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Dashboard;
use App\Http\Controllers\Pages;

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


Route::get('/', [Dashboard::class, 'index']);


Route::get('/pages/create', [Pages::class, 'create'])->name('pagecreate');
Route::post('/pages/store', [Pages::class, 'store'])->name('createpage');
Route::get('/pages/{slug}', [Pages::class, 'frontView'])->where('slug','.+');