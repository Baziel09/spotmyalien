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
});

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Route::get('settings/profile', Profile::class)->name('settings.profile');
    Route::get('settings/password', Password::class)->name('settings.password');
    Route::get('settings/appearance', Appearance::class)->name('settings.appearance');
});

Route::get('/doneren', [DonationController::class, 'show'])->name('donate');
Route::post('/doneren', [DonationController::class, 'checkout'])->name('donate.checkout');
Route::get('/doneren/succes', fn () => view('succes'))->name('donate.success');
Route::get('/doneren/geannuleerd', [DonationController::class, 'cancel'])->name('donate.cancel');


require __DIR__.'/auth.php';
