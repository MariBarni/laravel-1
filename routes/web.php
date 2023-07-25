<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ResumeController;
use App\Http\Livewire\ProfileForm;
use App\Http\Livewire\SessionForm;
use App\Http\Livewire\ShowDesigns;


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


//Route::get('/resume?{id}', [ResumeController::class, 'show'])->name('resume');
Route::get('/resume/download/{id}',[ResumeController::class, 'download'])->name('resume.download');

Route::get('/resume/{id}', [ResumeController::class, 'show'])->name('resume.show');
Route::get('/preview/{id}/{name}', [ResumeController::class, 'preview'])->name('preview.show');
Route::get('/download/{id}/{name}', [ResumeController::class, 'herunteladen'])->name('preview.download');

//Route::get('resume/', 'App\Http\Controllers\ResumeController@show');


Route::get('/modelle/{id}', ShowDesigns::class)->name('model.show');


Route::view('/main','main')->name('main');
Route::view('/register','register')->name('register');
Route::view('/registration-success','registration-success')->name('registration.success');

//Route::get('/blog/{id}', function ($id) { return view('modale.blade', compact('id') ); });
