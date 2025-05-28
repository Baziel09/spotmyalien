<?php

use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DonationController;


Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/contact', fn () => view('contact'))->name('contact');

Route::get('/overons', fn () => view('about'))->name('about');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::get('/report', function () {
    return view('report');
})->name('report');

Route::middleware(['auth'])->group(function () {
   Route::get('/mijn-meldingen', function () {
        return view('my-reports');
    })->name('my-reports');
});

Route::get('/doneren', [DonationController::class, 'show'])->name('donate');
Route::post('/doneren', [DonationController::class, 'checkout'])->name('donate.checkout');
Route::get('/doneren/succes', fn () => view('succes'))->name('donate.success');
Route::get('/doneren/geannuleerd', [DonationController::class, 'cancel'])->name('donate.cancel');


require __DIR__.'/auth.php';
