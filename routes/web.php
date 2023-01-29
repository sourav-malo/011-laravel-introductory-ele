<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
  return view('welcome');
});

Route::get('/dashboard', function () {
  return view('admin.index');
})->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//   Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//   Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//   Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

Route::controller(AdminController::class)->group(function(){
  Route::get('/admin/logout', 'destroy')->name('admin.logout');
  Route::get('/admin/profile/view', 'viewProfile')->name('admin.profile.view');
  Route::get('/admin/profile/edit', 'editProfile')->name('admin.profile.edit');
  Route::post('/admin/profile/edit', 'editProfileHandler')->name('admin.profile.edit');
  Route::get('/admin/change-password', 'changePassword')->name('admin.change-password');
  Route::post('/admin/change-password', 'changePasswordHandler')->name('admin.change-password');
});

require __DIR__.'/auth.php';
