<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\CheckoutController;


use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\AdminEventController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\AdminTransactionsController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\EventController as AdminEventResourceController;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index']);

Route::get('/events/{event}', [EventController::class, 'show'])
    ->name('events.show');

Route::get('/checkout/{event}', [CheckoutController::class, 'create'])
    ->name('checkout.create');

Route::post('/checkout/{event}', [CheckoutController::class, 'store'])
    ->name('checkout.store');

Route::get('/ticket', [TicketController::class, 'index']);

/*
|--------------------------------------------------------------------------
| Partner Routes (CRUD)
|--------------------------------------------------------------------------
*/

// READ
Route::get('/admin/partners', [PartnerController::class, 'index'])
    ->name('partners.index');

// CREATE FORM
Route::get('/admin/partners/create', [PartnerController::class, 'create'])
    ->name('partners.create');

// STORE
Route::post('/admin/partners/store', [PartnerController::class, 'store'])
    ->name('partners.store');

// EDIT FORM
Route::get('/admin/partners/{id}/edit', [PartnerController::class, 'edit'])
    ->name('partners.edit');

// UPDATE
Route::put('/admin/partners/{id}', [PartnerController::class, 'update'])
    ->name('partners.update');

// DELETE
Route::delete('/admin/partners/{id}', [PartnerController::class, 'destroy'])
    ->name('partners.destroy');

/*
|--------------------------------------------------------------------------
| Category Routes (CRUD)
|--------------------------------------------------------------------------
*/

// READ
Route::get('/admin/categories', [CategoryController::class, 'index'])
    ->name('categories.index');

// CREATE FORM
Route::get('/admin/categories/create', [CategoryController::class, 'create'])
    ->name('categories.create');

// STORE
Route::post('/admin/categories/store', [CategoryController::class, 'store'])
    ->name('categories.store');

// EDIT FORM
Route::get('/admin/categories/{id}/edit', [CategoryController::class, 'edit'])
    ->name('categories.edit');

// UPDATE
Route::put('/admin/categories/{id}', [CategoryController::class, 'update'])
    ->name('categories.update');

// DELETE
Route::delete('/admin/categories/{id}', [CategoryController::class, 'destroy'])
    ->name('categories.destroy');

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

Route::prefix('admin')->name('admin.')->group(function () {

    Route::get('/login', [AuthController::class, 'showLogin'])
        ->name('login');

    Route::post('/login', [AuthController::class, 'login'])
        ->name('login.post');

    Route::post('/logout', [AuthController::class, 'logout'])
        ->name('logout');

    Route::middleware(['auth', 'admin'])->group(function () {

    // DASHBOARD
    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    // EVENTS
    Route::resource('events', AdminEventResourceController::class);

    // TRANSACTIONS
    Route::get('/transactions', [\App\Http\Controllers\Admin\TransactionController::class, 'index'])
    ->name('transactions.index');

        });

});