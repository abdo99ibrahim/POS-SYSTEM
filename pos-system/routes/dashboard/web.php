<?php

use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\Client\OrderController;
use App\Http\Controllers\Dashboard\ClientController;
use App\Http\Controllers\Dashboard\WelcomeController;
use App\Http\Controllers\Dashboard\ProductController;
use App\Http\Controllers\Dashboard\UserController;
use App\Models\Client;
use Illuminate\Support\Facades\Route;
    // routes/web.php
    Route::group(['prefix' => LaravelLocalization::setLocale(),'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]], function()
{
    Route::prefix('dashboard')->name('dashboard.')->middleware(['auth'])->group(function () {
        Route::get('/',[WelcomeController::class,'index']) -> name('welcome');

        Route::resource('users',UserController::class)->except(['show']);
        Route::resource('categories',CategoryController::class)->except(['show']);
        Route::resource('products',ProductController::class)->except(['show']);
        Route::resource('clients',ClientController::class)->except(['show']);
        Route::resource('clients.orders',OrderController::class)->except(['show']);

/** OTHER PAGES THAT SHOULD NOT BE LOCALIZED **/

        // Route::get('/',[WelcomeController::class,'index'])->name('welcome');

        //User Routes

        // Route::resource('categories',CategoryController::class)->except(['show']);

        // Route::resource('products',ProductController::class)->except(['show']);

        // Route::resource('clients',ClientController::class)->except(['show']);
        // Route::resource('clients.orders',ClientOrderController::class)->except(['show']);

        // Route::resource('orders',OrderController::class);
        // Route::get('orders/{order}/products', [OrderController::class,'products'])->name('orders.products');

    });// end route of dashborad
    });
