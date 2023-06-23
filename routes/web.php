<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ResumeController;
use App\Http\Livewire\ProfileForm;

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
Route::get("/{id}",function($id) {
    return view("profile", compact('id'));
});

//Route::get('/resume?{id}', [ResumeController::class, 'show'])->name('resume');
Route::get('/resume/download/{id}',[ResumeController::class, 'download'])->name('resume.download');

Route::get('/resume/{id}', [ResumeController::class, 'show'])->name('resume.show');

Route::get('resume/', [ResumeController::class, 'show']);

//Route::get('resume/', 'App\Http\Controllers\ResumeController@show');


Route::get('/test', function () {
    return view('test');
});

Route::view('/test', 'test');


//Route::get('/blog/{id}', function ($id) { return view('modale.blade', compact('id') ); });
