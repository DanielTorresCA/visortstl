<?php

use App\Http\Controllers\StlfileController;
use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\StlViewerController;
use App\Http\Controllers\ProyectController;
use App\Http\Controllers\FilamentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Route::get('settings/profile', Profile::class)->name('settings.profile');
    Route::get('settings/password', Password::class)->name('settings.password');
    Route::get('settings/appearance', Appearance::class)->name('settings.appearance');
});
Route::get('/stl/view/{id}', [StlViewerController::class, 'show'])->name('stl.view');
Route::get('categorias', [CategoryController::class, 'index'])->name('category');
Route::resource('categories', CategoryController::class);
Route::resource('stls', StlfileController::class);
Route::resource('proyects', ProyectController::class);
Route::post('proyects/{id}/complete', [ProyectController::class, 'entregarProyect'])->name('proyects.complete');
Route::post('proyects/{id}/cancel', [ProyectController::class, 'cancelarProyect'])->name('proyects.cancel');
Route::resource('filaments', FilamentController::class);
require __DIR__.'/auth.php';