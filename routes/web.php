<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeBannerController;
use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\BlogCategoryController;
use App\Http\Controllers\BlogPostController;

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

  Route::controller(BlogCategoryController::class)->group(function(){
    Route::get('/blog-categories', 'index')->name('blog_categories.index');
    Route::get('/blog-categories/create', 'create')->name('blog_categories.create');
    Route::post('/blog-categories', 'store')->name('blog_categories.store');
    Route::get('/blog-categories/{id}', 'show')->name('blog_categories.show');
    Route::get('/blog-categories/{id}/edit', 'edit')->name('blog_categories.edit');
    Route::put('/blog-categories/{id}', 'update')->name('blog_categories.update');
    Route::delete('/blog-categories/{id}', 'destroy')->name('blog_categories.destroy');
  });

  Route::controller(BlogPostController::class)->group(function(){
    Route::get('/blog-posts', 'index')->name('blog_posts.index');
    Route::get('/blog-posts-filter', 'indexFilter')->name('blog_posts_filter.index');
    Route::get('/blog-posts/create', 'create')->name('blog_posts.create');
    Route::post('/blog-posts', 'store')->name('blog_posts.store');
    Route::get('/blog-posts/{id}', 'show')->name('blog_posts.show');
    Route::get('/blog-posts/{id}/edit', 'edit')->name('blog_posts.edit');
    Route::put('/blog-posts/{id}', 'update')->name('blog_posts.update');
    Route::delete('/blog-posts/{id}', 'destroy')->name('blog_posts.destroy');
  });
});

require __DIR__.'/auth.php';
