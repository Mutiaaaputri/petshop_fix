<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PembelianController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\StorebeliController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\BayarController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginadminController;
use App\Http\Controllers\DatapembayaranController;
use App\Http\Controllers\UserController;
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

Route::get('/', [HomeController::class, 'index'])->name('index');
Route::resource('product', ProductController::class)->middleware('auth:admins');
Route::resource('databayar', DatapembayaranController::class)->middleware('auth:admins');
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');
Route::get('/catalog', [CatalogController::class, 'catalog'])->name('catalog');
Route::get('/detailproduct/{id}', [StorebeliController::class, 'detailproduct'])->name('detailproduct')->middleware('auth');
Route::get('/beli/{id}', [PembelianController::class, 'beli'])->name('beli')->middleware('auth');
Route::put('/pembayaran/{id}', [PembayaranController::class, 'pembayaran'])->name('pembayaran')->middleware('auth');
Route::get('/history/{id}', [HistoryController::class, 'history'])->name('history')->middleware('auth');
Route::get('/bayar/{id}', [BayarController::class, 'bayar'])->name('bayar')->middleware('auth');
Route::get('/admin', [AdminController::class, 'admin'])->name('admin');
Route::post('/loginadmin', [LoginadminController::class, 'login'])->name('loginadmin');
Route::get('/homeadmin', [AdminController::class, 'homeadmin'])->name('homeadmin')->middleware('auth:admins');
Route::post('/logoutadmin', [LoginadminController::class, 'logout'])->name('logoutadmin');
Route::put('/uplodbukti/{id}', [BayarController::class, 'uplodbukti'])->name('uplodbukti')->middleware('auth');
Route::get('/history2/{id}', [HistoryController::class, 'history2'])->name('history2')->middleware('auth');
Route::get('/history3/{id}', [HistoryController::class, 'history3'])->name('history3')->middleware('auth');
Route::get('/getpembayaran', [DatapembayaranController::class, 'getData'])->name('databayar.getData');
Route::get('/getprodut', [ProductController::class, 'getDataproduct'])->name('product.getDataproduct');
Route::resource('users', UserController::class)->middleware('auth:admins');
Route::get('/getusers', [UserController::class, 'getDatauser'])->name('users.getDatauser');
Route::get('/getpembayaranex', [DatapembayaranController::class, 'exgetData'])->name('databayar.exgetData')->middleware('auth:admins');
Route::get('/listpembayaranex', [DatapembayaranController::class, 'exindex'])->name('databayar.exindex')->middleware('auth:admins');
Route::delete('/destroyex/{id}', [DatapembayaranController::class, 'exdestroy'])->name('databayar.exdestroy')->middleware('auth:admins');
Route::get('/getpembayaranse', [DatapembayaranController::class, 'segetData'])->name('databayar.segetData')->middleware('auth:admins');
Route::get('/listpembayaranse', [DatapembayaranController::class, 'seindex'])->name('databayar.seindex')->middleware('auth:admins');
Route::get('exportPdfproduct', [ProductController::class, 'exportPdfproduct'])->name('product.exportPdf')->middleware('auth:admins');
Route::get('exportPdfuser', [UserController::class, 'exportPdfuser'])->name('user.exportPdf')->middleware('auth:admins');
Route::get('exportPdfbayar', [DatapembayaranController::class, 'exportPdfbayar'])->name('databayar.exportPdf')->middleware('auth:admins');
Route::get('exportEcelproduct', [ProductController::class, 'exportEcelproduct'])->name('product.exportEcel')->middleware('auth:admins');
Route::get('exportEcelDatapembayar', [DatapembayaranController::class, 'exportEcelDatapembayar'])->name('databayar.exportEcel')->middleware('auth:admins');
Route::get('exportEceluser', [UserController::class, 'exportEceluser'])->name('user.exportEcel')->middleware('auth:admins');
