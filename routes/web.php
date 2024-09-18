<?php

use App\Http\Controllers\TenantController;
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
        Route::resource('tenants', TenantController::class);
    });
}
