<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ResumeController;
use App\Http\Controllers\Profile\ShowController;

use App\Http\Livewire\ProfileForm;
use App\Http\Livewire\SessionForm;
use App\Http\Livewire\ShowDesigns;
use App\Http\Livewire\EditStepForm;
use App\Http\Livewire\LoginForm;

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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    /*Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');*/
    
    Route::get('/preview/{id}/{name}', [ResumeController::class, 'preview'])->name('preview.show');
    Route::get('/download/{id}/{name}', [ResumeController::class, 'herunteladen'])->name('preview.download');
    
});

Route::middleware('auth')->prefix('profile')->as('profile.')->group(function () {
    Route::get('/',ShowController::class)->name('show');

    Route::prefix('experiences')->as('experiences.')->group(function () {
    Route::get('/', App\Http\Controllers\Profile\Experience\ShowController::class)->name('show');
    });
 
/*
    Route::prefix('links')->as('links.')->group(function () {
        Route::get('/', LinkShowController::class)->name('show');
        Route::get('/{link:token}', TemplateShowController::class)->name('template');
    });*/

});

require __DIR__.'/auth.php';

Route::get('/extra', function () {
    return view('form');
})->name('home');
Route::get('/modelle/{id}', ShowDesigns::class)->name('model.show');
Route::get('/edit/{id}', EditStepForm::class)->name('model.edit');

Route::view('/anmelden','anmelden')->name('anmelden');
Route::get('/abmelden', [LoginForm::class, 'abmelden'])->name('abmelden');

