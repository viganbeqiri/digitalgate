<?php

use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PagesController;
use App\Http\Controllers\Admin\PortofolioController;
use App\Http\Controllers\Admin\ProductsController;
use App\Http\Controllers\Admin\TeamsController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DynamicFormsStorageController;
use App\Models\AboutUs;
use App\Models\Category;
use App\Models\Page;
use App\Models\Portofolio;
use App\Models\Team;
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
    try {
        $pages = Category::where('slug', 'services')->with('pages')->first();
        if ($pages) {
            foreach ($pages->pages as $page) {
                Route::get($page->slug, [App\Http\Controllers\ServicesController::class, 'index'])->name($page->slug);
                Route::get($page->slug . '/order', [App\Http\Controllers\ServicesController::class, 'order'])->name($page->slug . '.order');
            }
        }
    } catch (\Exception $e) {
    }
});

Route::prefix('order')->name('order.')->middleware('auth')->group(function () {
    Route::post('/pickdeck', [App\Http\Controllers\OrdersController::class, 'storePickDeck'])->name('storePickDeck');
    Route::post('/cohort', [App\Http\Controllers\OrdersController::class, 'storeCohort'])->name('storeCohort');
    Route::post('/nda', [App\Http\Controllers\OrdersController::class, 'storeNDA'])->name('storeNDA');
    Route::post('/details', [App\Http\Controllers\OrdersController::class, 'storeDetail'])->name('storeDetail');
    Route::post('/payment', [App\Http\Controllers\OrdersController::class, 'storePaymentDetail'])->name('storePaymentDetail');
    Route::get('/', [App\Http\Controllers\OrdersController::class, 'index'])->name('index');
    Route::get('/{id}', [App\Http\Controllers\OrdersController::class, 'show'])->name('show');
});

Route::prefix('outsourcing')->name('outsourcing.')->group(function () {
    Route::get('/', function () {
        $page = Page::where('slug', 'outsourcing')->first();
        if ($page) {
            return Inertia::render('Outsourcing', [
                'page' => $page
            ]);
        }
    })->name('index');

    Route::get('/get-quote', [App\Http\Controllers\OutsourcingController::class, 'quote'])->name('quote');
    Route::post('/get-quote', [App\Http\Controllers\OutsourcingController::class, 'storeQuote'])->name('store');

    try {
        $pages = Category::where('slug', 'outsourcing')->with('pages.parent')->first();
        if ($pages) {
            foreach ($pages->pages as $page) {
                Route::get($page->slug, [App\Http\Controllers\OutsourcingController::class, 'index'])->name($page->slug);
            }
        }
    } catch (\Exception $e) {
    }
});

Route::get('/portfolio', function () {
    $portofolios = Portofolio::all();
    return Inertia::render('Portofolio', [
        'portofolios' => $portofolios
    ]);
})->name('portfolio');

Route::get('/search', [App\Http\Controllers\SearchController::class, 'search'])->name('search');

Route::get('/team', function () {
    $teams = Team::all();
    return Inertia::render('Team', [
        'teams' => $teams
    ]);
})->name('team');

Route::get('/about-us', function () {
    $about = AboutUs::first();
    return Inertia::render('About', [
        'about' => $about
    ]);
})->name('about-us');
Route::get('/contact-us', function () {
    return Inertia::render('Contact', []);
})->name('contact-us');




Route::prefix('incubator')->name('incubator.')->group(function () {
    Route::get('/why-us', function () {
        $page = Page::where('slug', 'incubation')->first();
        return Inertia::render('Incubation/WhyUs', [
            'page' => $page
        ]);
    })->name('why-us');
    Route::get('/incubation', [App\Http\Controllers\ServicesController::class, 'order'])->name('incubation');


    Route::get('/cohort', function () {
        return Inertia::render('Incubation/Cohort', []);
    })->name('cohort');
    // Route::get('/incubation', function () {
    //     return Inertia::render('order', []);
    // })->name('incubation');

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
Route::get('gdrp', function () {
    return Inertia::render('gdrp', []);
})->name('gdrp');

Route::get('privacy', function () {
    return Inertia::render('Privacy', []);
})->name('privacy');
Route::get('cookies', function () {
    return Inertia::render('Cookies', []);
})->name('cookies');


Route::post('contact-us', [ContactController::class, 'sendContactForm'])->name('contact-us.send');

Route::get('sign-in', function () {
    return Inertia::render('Auth/SignIn', []);
})->name('login');
Route::prefix('panel')->name('admin.')->middleware('auth.admin')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('index');

    Route::prefix('users')->name('users.')->group(function () {
        Route::get('/', [UsersController::class, 'index'])->name('index');
    });

    Route::prefix('categories')->name('categories.')->group(function () {
        Route::get('/', [CategoriesController::class, 'index'])->name('index');
        Route::get('/add-edit/{slug?}', [CategoriesController::class, 'createEdit'])->name('createEdit');
        Route::post('/store', [CategoriesController::class, 'store'])->name('store');
    });

    Route::prefix('pages')->name('pages.')->group(function () {
        Route::get('/', [PagesController::class, 'index'])->name('index');
        Route::get('/add-edit/{slug?}', [PagesController::class, 'createEdit'])->name('createEdit');
    });

    Route::prefix('products')->name('products.')->group(function () {
        Route::get('/', [ProductsController::class, 'index'])->name('index');
        Route::get('/add-edit/{slug?}', [ProductsController::class, 'createEdit'])->name('createEdit');
    });

    Route::prefix('teams')->name('teams.')->group(function () {
        Route::get('/', [TeamsController::class, 'index'])->name('index');
        Route::get('/add-edit/{slug?}', [TeamsController::class, 'createEdit'])->name('createEdit');
    });

    Route::prefix('portfolio')->name('portfolio.')->group(function () {
        Route::get('/', [PortofolioController::class, 'index'])->name('index');
        Route::get('/add-edit/{slug?}', [PortofolioController::class, 'createEdit'])->name('createEdit');
    });
});
Route::prefix('dynamic-forms')->name('dynamic-forms.')->group(function () {
    // Dummy route so we can use the route() helper to give formiojs the base path for this group
    Route::get('/')->name('index');

    Route::post('storage/s3', [DynamicFormsStorageController::class, 'storeS3'])
        ->withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class]);

    Route::get('storage/s3', [DynamicFormsStorageController::class, 'showS3'])->name('S3-file-download');
    Route::get('storage/s3/{fileKey}', [DynamicFormsStorageController::class, 'showS3'])->name('S3-file-redirect');

    Route::post('storage/url', [DynamicFormsStorageController::class, 'storeURL'])
        ->withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class]);

    Route::get('storage/url', [DynamicFormsStorageController::class, 'showURL'])->name('url-file-download');
    Route::delete('storage/url', [DynamicFormsStorageController::class, 'deleteURL']);
});
