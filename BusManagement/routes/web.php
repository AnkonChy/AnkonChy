<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BusController;
use App\Http\Controllers\FareController;
use App\Http\Controllers\TripController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\DashboardController;

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

Route::get('/dashboard', function () {
    return view('backend.pages.dashboard.dashboard-page');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/logout', [DashboardController::class, 'Logout'])->name('dashboard.logout');
});
Route::middleware('auth')->group(function(){
    //location crud
    Route::controller(LocationController::class)->group(function(){
        Route::get('/location','LocationPage')->name('location.page');
        Route::get('/location/create','Create')->name('location.create');
        Route::post('location/store','Store')->name('location.store');
        Route::get('/location/edit/{id}','Edit')->name('location.edit');
        Route::post('location/update','Update')->name('location.update.now');
        Route::get('/delete/{id}','Delete');
    });
    //bus crud
    Route::controller(BusController::class)->group(function(){
        Route::get('/bus','BusPage')->name('bus.page');
        Route::get('/bus/create','Create')->name('bus.create');
        Route::post('bus/store','Store')->name('bus.store');
        Route::get('/bus/edit/{id}','Edit')->name('bus.edit');
        Route::post('bus/update/{id}','Update')->name('bus.update');
        Route::get('/delete/{id}','Delete');
    });
    //fare crud
    Route::controller(FareController::class)->group(function(){
        Route::get('/fare','FarePage')->name('fare.page');
        Route::get('/fare/create','Create')->name('fare.create');
        Route::post('fare/store','Store')->name('fare.store');
        Route::get('/fare/edit/{id}','Edit')->name('fare.edit');
        Route::post('fare/update/{id}','Update')->name('fare.update');
        Route::get('fare/delete/{id}','Delete');
    });
    //trip crud
    Route::controller(TripController::class)->group(function(){
        Route::get('/trip','FarePage')->name('trip.page');
        Route::get('/trip/create','Create')->name('trip.create');
        Route::post('trip/store','Store')->name('trip.store');
        Route::get('/trip/edit/{id}','Edit')->name('trip.edit');
        Route::post('trip/update/{id}','Update')->name('trip.update');
        Route::get('/delete/{id}','Delete');
    });
});

require __DIR__.'/auth.php';
