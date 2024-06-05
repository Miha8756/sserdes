<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PageController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\GoodDeedController;

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');

    Route::controller(PortfolioController::class)->group(function () {
       Route::get('/admin-portfolios', 'index')->name('portfolio.index');
       Route::get('/admin-portfolios/create', 'create')->name('portfolio.create');
       Route::post('/admin-portfolios', 'store')->name('portfolio.store');
       Route::get('/admin-portfolios/{id}/edit', 'edit')->name('portfolio.edit');
       Route::put('/admin-portfolios/{id}', 'update')->name('portfolio.update');
       Route::delete('/admin-portfolios/{id}', 'destroy')->name('portfolio.destroy');
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
