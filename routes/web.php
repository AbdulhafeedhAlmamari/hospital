<?php

use App\Http\Controllers\FileController;
use App\Http\Controllers\OvrReportController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

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


// Route::get('/', function () {
//     return view('layouts.main');
// });

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


// Home page
Route::get('/', [PostController::class, 'index'])->name('home');


// Language Change
Route::get('lang/{lang}', function ($lang) {
    if (in_array($lang, ['en', 'ar'])) {
        session(['applocale' => $lang]);
    }
    return redirect()->back();
})->name('lang');


// files
Route::get('/post/{post}', [PostController::class, 'show'])->name('posts.show');
Route::get('/file/{file}', [FileController::class, 'show'])->name('files.show');

// OVR
Route::get('/ovr', [OvrReportController::class, 'create'])->name('ovr.create');
Route::post('/ovr', [OvrReportController::class, 'store'])->name('ovr.store');
Route::get('/ovr/{ovr}', [OvrReportController::class, 'show'])->name('ovr.show');
Route::get('/search', [OvrReportController::class, 'search'])->name('search');
Route::post('search', [OvrReportController::class, 'submitSearch'])->name('submit.search');
// Admin

Route::get('/admin', function () {
    return view('admin.index');
})->name('admin.dashboard');
