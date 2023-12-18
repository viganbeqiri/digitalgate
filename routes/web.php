<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Overview', []);
})->name('home');

Route::prefix('services')->name('services.')->group(function () {
    Route::get('/desktop-app-development', function () {
        return Inertia::render('Services', []);
    })->name('desktop-app-development');

    Route::get('/mobile-app-development', function () {
        return Inertia::render('Services', []);
    })->name('mobile-app-development');

    Route::get('/web-development', function () {
        return Inertia::render('Services', []);
    })->name('web-development');
    Route::get('/cross-platform-development', function () {
        return Inertia::render('Services', []);
    })->name('cross-platform-development');

    Route::get('/design-service', function () {
        return Inertia::render('Services', []);
    })->name('design-service');
});

Route::prefix('outsourcing')->name('outsourcing.')->group(function () {
    Route::get('/team-as-a-service', function () {
        return Inertia::render('Services', []);
    })->name('team-as-a-service');

    Route::get('/it-outsourcing-services', function () {
        return Inertia::render('Services', []);
    })->name('it-outsourcing-services');

    Route::get('/cyber-security-services', function () {
        return Inertia::render('Services', []);
    })->name('cyber-security-services');
});

Route::get('/portofolio', function () {
    return Inertia::render('Services', []);
})->name('portofolio');


Route::prefix('incubator')->name('incubator.')->group(function () {
    Route::get('/why-us', function () {
        return Inertia::render('Services', []);
    })->name('why-us');

    Route::get('/cohort', function () {
        return Inertia::render('Services', []);
    })->name('cohort');
    Route::get('/incubation', function () {
        return Inertia::render('Services', []);
    })->name('incubation');

    Route::get('/acceleration', function () {
        return Inertia::render('Services', []);
    })->name('acceleration');
});
