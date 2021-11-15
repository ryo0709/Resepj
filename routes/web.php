<?php

use App\Http\Controllers\LikeController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\UserController;
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
Route::get('/', [ShopController::class, 'index'])->name('index');//トップページ　飲食店一覧ページ
Route::get('/detail/{shop_id}', [ShopController::class, 'detail'])->name('detail');//飲食店詳細ページ

Route::get('/mypage', [UserController::class, 'mypage']);//マイページ
Route::get('/thanks', function () {//サンクスページ　（会員登録完了）
    return view('thanks');
});

Route::get('/area_search', [ShopController::class, 'area_search']);//エリア検索機能
Route::get('/name_search', [ShopController::class, 'name_search']);//店舗名検索機能　＊ジャンル検索はｊｓ

Route::get('/liked', [LikeController::class, 'liked'])->name('liked');//Like機能　お気に入り店舗追加・削除

Route::post('/reservation', [ReservationController::class, 'reservation']);//予約機能
Route::post('/reservation_change', [ReservationController::class, 'reservation_change']);//予約変更機能
Route::post('/delete/{resevation_id}', [ReservationController::class, 'delete'])->name('delete');//予約削除機能
Route::get('/done', function () {//予約完了ページ
    return view('done');
});

Route::post('/review', [ReviewController::class, 'review']);//評価機能　（レビュー）
Route::post('/review_change', [ReviewController::class, 'review_change']);//評価変更機能

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';
