<?php

use App\Http\Controllers\AreaController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LikeController;
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
Route::get('/done', function () {
    return view('done');
});
Route::get('/search', [ShopController::class, 'search']);
Route::get('/find', [ShopController::class, 'find']);

Route::get('/liked', [LikeController::class, 'liked'])->name('liked');



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
