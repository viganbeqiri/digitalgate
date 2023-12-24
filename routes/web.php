<?php

use App\Http\Controllers\AuthController;
use App\Models\Category;
use App\Models\Page;
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
    return Inertia::render('Overview', [
        'active' => ['home']
    ]);
})->name('home');

Route::prefix('services')->name('services.')->group(function () {
    $pages = Category::where('slug', 'services')->with('pages')->firstOrFail();
    foreach ($pages->pages as $page) {
        Route::get($page->slug, [App\Http\Controllers\ServicesController::class, 'index'])->name($page->slug);
        Route::get($page->slug . '/order', [App\Http\Controllers\ServicesController::class, 'order'])->name($page->slug . '.order');
    }
});

Route::prefix('outsourcing')->name('outsourcing.')->group(function () {
    Route::get('/', function () {
        $page = Page::where('slug', 'outsourcing')->firstOrFail();
        return Inertia::render('Outsourcing', [
            'page' => $page
        ]);
    })->name('index');
    $pages = Category::where('slug', 'outsourcing')->with('pages')->firstOrFail();
    foreach ($pages->pages as $page) {
        Route::get($page->slug, [App\Http\Controllers\OutsourcingController::class, 'index'])->name($page->slug);
    }
});

Route::get('/portofolio', function () {
    return Inertia::render('Portofolio', []);
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

Route::prefix('auth')->name('auth.')->group(function () {
    Route::get('/', function () {
        return Inertia::render('Auth', []);
    })->name('index');
    Route::post('register', [AuthController::class, 'register'])->name('register');
    Route::post('login', [AuthController::class, 'login'])->name('login');
});

Route::get('sign-up', function () {
    return Inertia::render('Auth/SignUp', []);
})->name('sign-up');

Route::get('sign-in', function () {
    return Inertia::render('Auth/SignIn', []);
})->name('sign-in');
