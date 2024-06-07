<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PageController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\GoodDeedController;
use App\Http\Controllers\AchievementController;
use App\Http\Controllers\ChatController;

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');

    Route::controller(NewsController::class)->group(function () {
       Route::get('/admin-news', 'index')->name('portfolio.index');
       Route::get('/admin-news/create', 'create')->name('portfolio.create');
       Route::post('/admin-news', 'store')->name('portfolio.store');
       Route::get('/admin-news/{id}/edit', 'edit')->name('portfolio.edit');
       Route::put('/admin-news/{id}', 'update')->name('portfolio.update');
       Route::delete('/admin-news/{id}', 'destroy')->name('portfolio.destroy');
   });

});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::controller(PageController::class)->group(function () {
    Route::get('/', 'index')->name('main');

    Route::get('/portfolio', 'portfolio')->name('portfolio');
    Route::get('/portfolio/{id}', 'portfolio_show')->name('portfolio-show');

    Route::get('/lk', 'lk')->name('lk');
});


Route::resource('good_deeds', GoodDeedController::class);
Route::resource('achievements', AchievementController::class);

Route::get('/chat', [ChatController::class, 'index'])->name('chat');
Route::get('/chat/{user}', [ChatController::class, 'show'])->name('chat.show');
Route::post('/chat/{user}', [ChatController::class, 'send'])->name('chat.send');



// Маршруты для добрых дел
Route::get('/good-deeds/{id}', [GoodDeedController::class, 'show'])->name('good-deeds.show');

// Маршруты для достижений
Route::get('/achievements/{id}', [AchievementController::class, 'show'])->name('achievements.show');
