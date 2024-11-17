<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AnalyticsController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PartnersController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\SlidesController;
use App\Http\Controllers\WorkFieldController;
use App\Models\Category;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [GalleryController::class, 'index'])->name('gallery.index');
Route::get('/news', [NewsController::class, 'ShowAll'])->name('news.all');
Route::get('/news/{news}', [NewsController::class, 'detailsNews'])->name('news.details');
Route::get('/news/{news}/like', LikeController::class)->name('news.like')->middleware('auth');
Route::get('/news/search', [NewsController::class, 'search'])->name('news.search');

Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
Route::get('/work-fields', [WorkFieldController::class, 'ShowWork'])->name('work.fields.index');
Route::get('/work-fields/{id}', [WorkFieldController::class, 'showDetails'])->name('work_fields.show');
Route::get('/work-fields/category/{id}', [WorkFieldController::class, 'showByCategory'])->name('work.category');
Route::get('/categories', [CategoriesController::class, 'category'])->name('all-category');



Route::middleware('guest')->group(function () {
    Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('/register', [RegisteredUserController::class, 'store'])->name('register.store');
    Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('/login', [AuthenticatedSessionController::class, 'store'])->name('login.store');
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('gallery');
    })->name('dashboard');

    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
});



Route::prefix('/admin')->middleware('can:update-products')->group(function(){
    Route::get('/', [AdminController::class, 'index'])->name('admin.index');
    Route::resource('/news','App\Http\Controllers\NewsController');
    Route::get('/settings', [SettingsController::class, 'edit'])->name('admin.settings.edit');
    Route::resource('/categories', 'App\Http\Controllers\CategoriesController');
    Route::resource('/users', 'App\Http\Controllers\UsersController')->middleware('can:update-users');
    Route::get('/message', [MessageController::class, 'index'])->name('message.index');
    Route::put('/settings/update', [SettingsController::class, 'update'])->name('admin.settings.update');
    Route::resource('/slides', 'App\Http\Controllers\SlidesController');
    Route::resource('partners', PartnersController::class);
    Route::get('/analytics', [AnalyticsController::class, 'index'])->name('analytics.index');
    Route::resource('/work_fields', WorkFieldController::class)->except('show');



});


Route::get('/about', function(){
$categories = Category::all();
return view('contact.about', compact('categories'));
})->name('about');


Route::get('/donate', function(){
$categories = Category::all();
return view('contact.donate', compact('categories'));
})->name('donate');


