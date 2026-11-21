<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Http\Request;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\NewsEventController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminBlogController;
use App\Http\Controllers\AdminNewsEventController;
use App\Http\Controllers\AdminGalleryController;
use App\Http\Controllers\AdminContactController;
use App\Http\Controllers\NadiAstrologyController;

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
    return view('welcome');
});

Route::get('/about-us', function () {
    return view('about');
});

Route::get('/nadi-astrology', [NadiAstrologyController::class, 'overview'])->name('nadi-astrology.overview');
Route::get('/nadi-astrology/{slug}', [NadiAstrologyController::class, 'show'])->name('nadi-astrology.show');

Route::get('/blogs', [BlogController::class, 'index'])->name('blogs.index');
Route::get('/blogs/load-more', [BlogController::class, 'loadMore'])->name('blogs.load-more');
Route::get('/blogs/{slug}', [BlogController::class, 'show'])->name('blogs.show');
Route::get('/news-events', [NewsEventController::class, 'index'])->name('news-events.index');
Route::get('/news-events/load-more', [NewsEventController::class, 'loadMore'])->name('news-events.load-more');
Route::get('/news-events/{slug}', [NewsEventController::class, 'show'])->name('news-events.show');
Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery.index');
Route::get('/contact-us', [ContactController::class, 'index'])->name('contact.index');
Route::post('/contact-us', [ContactController::class, 'store'])->name('contact.store');

Route::get('/admin/login', [AdminAuthController::class, 'showLogin'])->name('admin.login');
Route::post('/admin/login', [AdminAuthController::class, 'login'])->name('admin.login.submit');
Route::post('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');
Route::middleware(\App\Http\Middleware\AdminAuth::class)->prefix('admin')->group(function () {
    Route::get('/', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
    Route::post('/blogs/upload-image', [AdminBlogController::class, 'uploadImage'])->name('admin.blogs.upload-image');
    Route::resource('blogs', AdminBlogController::class)->except(['show'])->names('admin.blogs');
    Route::resource('news-events', AdminNewsEventController::class)->except(['show'])->names('admin.news-events');
    Route::resource('gallery', AdminGalleryController::class)->except(['show'])->names('admin.gallery');
    Route::get('/contact-messages', [AdminContactController::class, 'index'])->name('admin.contact.index');
    Route::delete('/contact-messages/{contact}', [AdminContactController::class, 'destroy'])->name('admin.contact.destroy');
});
Route::get('/deploy/clear-cache', function (Request $request) {
    if (!hash_equals(env('DEPLOY_CACHE_SECRET', ''), $request->query('secret', ''))) {
        abort(403);
    }

    $commands = [
        'cache:clear',
        'route:clear',
        'config:clear',
        'view:clear',
        'storage:link',
    ];

    $output = [];
    foreach ($commands as $command) {
        Artisan::call($command);
        $output[] = $command . ': ' . trim(Artisan::output());
    }

    return response()->json([
        'status' => 'success',
        'results' => $output,
    ]);
})->name('deploy.clear-cache');