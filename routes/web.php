<?php

use App\Models\Animal;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AnimalController;
use App\Http\Controllers\AnimalAppointmentController;
use App\Http\Controllers\AdoptionApplicationController;
use App\Http\Controllers\KaponController;
use App\Http\Controllers\AdminAdoptionController;;

use App\Http\Controllers\AdminDashboardController;

use Illuminate\Support\Facades\Auth;

Route::get('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');

Route::get('/', function () {
    $animals = Animal::where('status', 'Available')
        ->latest()
        ->take(3)
        ->get();
    return view('welcome_page', compact('animals'));
});

Route::get('/dashboard', function (Illuminate\Http\Request $request) {

    if ($request->user()->role === 'admin') {
        return redirect()->route('admin.dashboard');
    } elseif ($request->user()->role === 'staff') {
        return redirect()->route('staff.animal');
    } elseif ($request->user()->role === 'user') {
        return redirect()->route('user.browse-pets');
    }

    return redirect('/');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

/* ADMIN */
Route::middleware(['auth'])->group(function () {
    Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
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

    // Admin Manage Adoption Application
    Route::get('/admin/adoption-applications', [AdminAdoptionController::class, 'index'])->name('admin.adoption.applications');
    Route::put('/admin/adoption-applications/{id}/approve', [AdminAdoptionController::class, 'approve'])->name('admin.adoption.approve');
    Route::put('/admin/adoption-applications/{id}/reject', [AdminAdoptionController::class, 'reject'])->name('admin.adoption.reject');

    Route::put('/admin/adoption-applications/{id}/paid', [AdminAdoptionController::class, 'markAsPaid'])->name('admin.adoption.paid');
});

/* STAFF */
Route::middleware(['auth'])->group(function () {
    Route::get('/staff/animal', [AnimalController::class, 'index'])->name('staff.animal');
    Route::post('/staff/animal', [AnimalController::class, 'store'])->name('staff.animal.store');
    Route::get('/staff/adoption-application', [AnimalAppointmentController::class, 'index'])->name('staff.adoption-application');
    Route::get('/staff/adoption-approved', [AnimalAppointmentController::class, 'approved'])->name('staff.adoption-approved');
    Route::put('/staff/adoption/{application}/approve', [AnimalAppointmentController::class, 'approve'])->name('staff.adoption.approve');
    Route::put('/staff/adoption/{application}/reject', [AnimalAppointmentController::class, 'reject'])->name('staff.adoption.reject');
    Route::get('/staff/kapon-appointments', [KaponController::class, 'staffIndex'])->name('staff.kapon-appointments');
    Route::put('/staff/kapon/{kapon}/status', [KaponController::class, 'updateStatus'])->name('staff.kapon.status');
});

/* USER */
Route::middleware(['auth'])->group(function () {
    Route::get('/user/browse-pets', [AdoptionApplicationController::class, 'browsePets'])->name('user.browse-pets');

    Route::get('/adoption-form/{animal}', [AdoptionApplicationController::class, 'create'])->name('adoption.form');
    Route::post('/adoption-form/{animal}', [AdoptionApplicationController::class, 'store'])->name('adoption.store');
    Route::delete('/adoption/{application}', [AdoptionApplicationController::class, 'cancel'])->name('adoption.cancel');

    Route::get('/user/my-appointments', [AdoptionApplicationController::class, 'myAppointments'])->name('user.my-appointments');

    Route::get('/user/donation', [DonationController::class, 'create'])->name('user.donation');

    Route::get('/user/kapon', [KaponController::class, 'create'])->name('user.kapon.create');
    Route::post('/user/kapon', [KaponController::class, 'store'])->name('user.kapon.store');
    Route::delete('/user/kapon/{kapon}', [KaponController::class, 'cancel'])->name('user.kapon.cancel');
});

Route::post('/donation', [DonationController::class, 'store'])->name('donation.store');

require __DIR__ . '/auth.php';
