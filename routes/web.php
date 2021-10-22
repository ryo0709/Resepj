<?php

use App\Http\Controllers\AreaController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\ReserveController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\UserController;
use App\Models\Category;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [UserController::class, 'index']);
Route::get('/auth', [UserController::class, 'check']);
Route::post('/auth', [UserController::class, 'checkUser']);
Route::get('/mypage', [UserController::class, 'mypage']);
Route::get('/thanks', function () {
    return view('thanks');
});
Route::get('/', [ShopController::class, 'index'])->name('index');
// Route::get('/relation ', [AreaController::class, 'relation ']);
// Route::get('/relation ', [CategoryController::class, 'relation ']);
Route::get('/detail/{shop_id}', [ShopController::class, 'detail'])->name('detail');
Route::post('/reserve', [ReserveController::class, 'reserve']);

Route::get('/area_search', [ShopController::class, 'area_search']);
Route::get('/genre_search', [ShopController::class, 'genre_search']);
Route::get('/name_search', [ShopController::class, 'name_search']);

Route::get('/liked', [LikeController::class, 'liked'])->name('liked');
Route::post('/unlike', [LikeController::class, 'unlike'])->name('unlike');

Route::get('/confirm/{shop_id}', [ReservationController::class, 'confirm'])->name('confirm');
Route::post('/reservation', [ReservationController::class, 'reservation']);
Route::post('/delete/{resevation_id}', [ReservationController::class, 'delete'])->name('delete');
Route::get('/done', function () {
    return view('done');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
