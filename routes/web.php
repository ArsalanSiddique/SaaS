<?php

use App\Http\Controllers\TenantController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Route;

// routes/web.php, api.php or any other central route files you have
foreach (config('tenancy.central_domains') as $domain) {
    Route::domain($domain)->group(function () {
        // your actual routes
        Route::get('/', function () {
            return view('welcome');
        });

        Auth::routes();

        Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

        Route::group(['middleware' => ['auth']], function () {
            Route::resource('tenants', TenantController::class);
            Route::resource('roles', RoleController::class);
            Route::resource('users', UserController::class);
        });
    });
}
