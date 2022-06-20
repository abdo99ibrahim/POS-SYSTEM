<?php
use Illuminate\Support\Facades\Route;

{
	Route::prefix('dashboard')->name('dashboard.')->group(function () {
        Route::get('/check',function(){
            return "This is Dashboard";
        });
        // Route::get('/',[WelcomeController::class,'index'])->name('welcome');
        
        //User Routes
        Route::resource('users',UserController::class);

        // Route::resource('categories',CategoryController::class)->except(['show']);

        // Route::resource('products',ProductController::class)->except(['show']);

        // Route::resource('clients',ClientController::class)->except(['show']);
        // Route::resource('clients.orders',ClientOrderController::class)->except(['show']);

        // Route::resource('orders',OrderController::class);
        // Route::get('orders/{order}/products', [OrderController::class,'products'])->name('orders.products');

    });// end route of dashborad

}
