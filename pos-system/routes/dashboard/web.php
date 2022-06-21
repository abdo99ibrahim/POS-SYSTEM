<?php

use App\Http\Controllers\Dashboard\DashboardController;
use Illuminate\Support\Facades\Route;
{
    // routes/web.php

Route::group(['prefix' => LaravelLocalization::setLocale()], function()
{
    Route::prefix('dashboard')->name('dashboard.')->group(function () {
        Route::get('/index',[DashboardController::class,'index']) -> name('index');

});

/** OTHER PAGES THAT SHOULD NOT BE LOCALIZED **/

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
