<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeBannerController;

Route::get('/', function () {
  return view('frontend.index');
});

Route::get('/dashboard', function () {
  return view('admin.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::controller(AdminController::class)->group(function(){
  Route::get('/admin/logout', 'destroy')->name('admin.logout');
  Route::get('/admin/profile/view', 'viewProfile')->name('admin.profile.view');
  Route::get('/admin/profile/edit', 'editProfile')->name('admin.profile.edit');
  Route::post('/admin/profile/edit', 'editProfileHandler')->name('admin.profile.edit');
  Route::get('/admin/change-password', 'changePassword')->name('admin.change-password');
  Route::post('/admin/change-password', 'changePasswordHandler')->name('admin.change-password');
});

Route::controller(HomeBannerController::class)->group(function(){
  Route::get('/home-banner/edit', 'editHomeBanner')->name('home-banner.edit');
  Route::post('/home-banner/edit', 'editHomeBannerHandler')->name('home-banner.edit');
});

require __DIR__.'/auth.php';
