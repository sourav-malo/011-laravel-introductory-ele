<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeBannerController;
use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\PortfolioController;

Route::get('/', function () {
  return view('frontend.index');
})->name('home');

Route::get('/dashboard', function () {
  return view('admin.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'verified'])->group(function(){
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

  Route::controller(AboutUsController::class)->group(function(){
    Route::get('/about-us', 'viewAboutUs')->name('about-us')->withoutMiddleware(['auth', 'verified']);
    Route::get('/about-us/edit', 'editAboutUs')->name('about-us.edit');
    Route::post('/about-us/edit', 'editAboutUsHandler')->name('about-us.edit');
  });

  Route::controller(PortfolioController::class)->group(function(){
    Route::get('/portfolios', 'index')->name('portfolios.index');
    Route::get('/portfolios/create', 'create')->name('portfolios.create');
    Route::post('/portfolios', 'store')->name('portfolios.store');
    Route::get('/portfolios/{id}', 'show')->name('portfolios.show');
    Route::get('/portfolios/{id}/edit', 'edit')->name('portfolios.edit');
    Route::put('/portfolios/{id}', 'update')->name('portfolios.update');
    Route::delete('/portfolios/{id}', 'destroy')->name('portfolios.destroy');
  });
});

require __DIR__.'/auth.php';
