<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\GceUsersController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return to_route('dashboard');
})->middleware(['auth', 'verified']);

Route::get('/dashboard', [GceUsersController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

/* Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard'); */

Route::get('/create-gce-user', function () {
    return Inertia::render('CreateGceUser');
})->middleware(['auth', 'verified'])->name('creategceuser');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('/gce-users', GceUsersController::class)->names([
    'index' => 'gce-users',
    'update' => 'gce-users.update',
    // 'store' => 'tasklist.store',
    // 'destroy' => 'tasklist.destroy',
]);

require __DIR__.'/auth.php';
