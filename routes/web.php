<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ResumeController;

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
    return view('profile');
});

Route::view('/resume','resume')->name('resume');
//Route::get('/resume?{id}', [ResumeController::class, 'show'])->name('resume');
//Route::get('/resume/download','ResumeController@download')->name('resume.download');

Route::get('/resume/{id}', [ResumeController::class, 'show']);
Route::get('resume/', [ResumeController::class, 'show']);

