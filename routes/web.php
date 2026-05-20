<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AnimalController;

Route::get('/', function () {
    return view('welcome_page');
});

Route::get('/dashboard', function (Illuminate\Http\Request $request) {
    if ($request->user()->role === 'admin') {
        return view('admin.dashboard');
    } elseif ($request->user()->role === 'staff') {
        return redirect()->route('staff.animal');
    }
    
    return redirect('/');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/admin/staff', [UserController::class, 'index'])->name('staff.index');
    Route::post('/admin/staff', [UserController::class, 'store'])->name('staff.store');
    Route::put('/admin/staff/{id}', [UserController::class, 'update'])->name('staff.update');
    Route::delete('/admin/staff/{id}', [UserController::class, 'destroy'])->name('staff.destroy');
    Route::patch('/admin/staff/{id}/toggle', [UserController::class, 'toggleStatus'])->name('staff.toggle');
    
    // Admin Animal Routes
    Route::get('/admin/animal', [\App\Http\Controllers\AdminAnimalController::class, 'index'])->name('admin.animal.index');
    Route::get('/admin/animal/{id}/edit', [\App\Http\Controllers\AdminAnimalController::class, 'edit'])->name('admin.animal.edit');
    Route::put('/admin/animal/{id}', [\App\Http\Controllers\AdminAnimalController::class, 'update'])->name('admin.animal.update');
    Route::delete('/admin/animal/{id}', [\App\Http\Controllers\AdminAnimalController::class, 'destroy'])->name('admin.animal.destroy');
});

Route::middleware(['auth'])->prefix('staff')->name('staff.')->group(function () {
    Route::get('/animal', [AnimalController::class, 'index'])->name('animal');
    Route::post('/animal', [AnimalController::class, 'store'])->name('animal.store');
});

Route::post('/donation', [DonationController::class, 'store'])->name('donation.store');

require __DIR__.'/auth.php';
