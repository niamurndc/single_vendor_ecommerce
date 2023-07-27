<?php

use App\Http\Controllers\BackupController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\FeatureController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PurshaceController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SellController;
use App\Http\Controllers\SeoSettingController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\SliderController;
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

Route::get('/', [App\Http\Controllers\Frontend\HomeController::class, 'index']);
Route::get('/shop', [App\Http\Controllers\Frontend\HomeController::class, 'shop']);
Route::get('/product/{id}', [App\Http\Controllers\Frontend\HomeController::class, 'details']);
Route::get('/category/{id}', [App\Http\Controllers\Frontend\HomeController::class, 'category']);
Route::get('/search', [App\Http\Controllers\Frontend\HomeController::class, 'search']);
Route::get('/cart', [App\Http\Controllers\Frontend\HomeController::class, 'cart']);
Route::get('/add-cart/{id}', [App\Http\Controllers\Frontend\HomeController::class, 'addcart']);
Route::post('/add-cart/{id}', [App\Http\Controllers\Frontend\HomeController::class, 'addcartpost']);
Route::post('/cart/update/{id}', [App\Http\Controllers\Frontend\HomeController::class, 'updatecart']);
Route::get('/cart/delete/{id}', [App\Http\Controllers\Frontend\HomeController::class, 'deleteCart']);
Route::get('/page/{name}', [App\Http\Controllers\Frontend\HomeController::class, 'showPage']);

// auth user route
Route::get('/checkout', [App\Http\Controllers\Frontend\HomeController::class, 'checkout'])->middleware('auth');
Route::get('/order', [App\Http\Controllers\Frontend\HomeController::class, 'order'])->middleware('auth');
Route::post('/order', [App\Http\Controllers\Frontend\HomeController::class, 'postorder'])->middleware('auth');
Route::get('/profile', [App\Http\Controllers\Frontend\HomeController::class, 'profile'])->middleware('auth');
Route::post('/profile', [App\Http\Controllers\Frontend\HomeController::class, 'updateprofile'])->middleware('auth');
Route::get('/save-later', [App\Http\Controllers\Frontend\HomeController::class, 'saveList'])->middleware('auth');
Route::get('/save-later/{id}', [App\Http\Controllers\Frontend\HomeController::class, 'saveListId'])->middleware('auth');
Route::get('/save-later/delete/{id}', [App\Http\Controllers\Frontend\HomeController::class, 'saveListDelete'])->middleware('auth');


Auth::routes();

Route::get('/home', [App\Http\Controllers\Frontend\HomeController::class, 'order'])->name('home');
Route::get('/admin/home', [App\Http\Controllers\HomeController::class, 'admin'])->name('admin.home')->middleware('admin');

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here I put admin routes serially
|
*/

// Admin Brands Route
// ************************

Route::get('/admin/brands', [BrandController::class, 'index']);
Route::post('/admin/brand/create', [BrandController::class, 'store']);
Route::get('/admin/brand/edit/{id}', [BrandController::class, 'edit']);
Route::post('/admin/brand/edit/{id}', [BrandController::class, 'update']);
Route::get('/admin/brand/delete/{id}', [BrandController::class, 'delete']);

// Admin Category Route
// ************************

Route::get('/admin/categories', [CategoryController::class, 'index']);
Route::post('/admin/category/create', [CategoryController::class, 'store']);
Route::get('/admin/category/edit/{id}', [CategoryController::class, 'edit']);
Route::post('/admin/category/edit/{id}', [CategoryController::class, 'update']);
Route::get('/admin/category/delete/{id}', [CategoryController::class, 'delete']);

// Admin Product Route
// ************************

Route::get('/admin/products', [ProductController::class, 'index']);
Route::get('/admin/product/create', [ProductController::class, 'create']);
Route::post('/admin/product/create', [ProductController::class, 'store']);
Route::get('/admin/product/edit/{id}', [ProductController::class, 'edit']);
Route::post('/admin/product/edit/{id}', [ProductController::class, 'update']);
Route::get('/admin/product/delete/{id}', [ProductController::class, 'delete']);

// Admin Customer Route
// ************************

Route::get('/admin/customers', [CustomerController::class, 'index']);
Route::get('/admin/customer/create', [CustomerController::class, 'create']);
Route::post('/admin/customer/create', [CustomerController::class, 'store']);
Route::get('/admin/customer/edit/{id}', [CustomerController::class, 'edit']);
Route::post('/admin/customer/edit/{id}', [CustomerController::class, 'update']);
Route::get('/admin/customer/delete/{id}', [CustomerController::class, 'delete']);


// Admin Purshace Route
// ************************

Route::get('/admin/purshaces', [PurshaceController::class, 'index']);
Route::get('/admin/purshace/create', [PurshaceController::class, 'create']);
Route::get('/admin/purshace/edit/{id}', [PurshaceController::class, 'edit']);
Route::get('/admin/purshace/delete/{id}', [PurshaceController::class, 'delete']);

// Admin Sell Route
// ************************

Route::get('/admin/sells', [SellController::class, 'index']);
Route::get('/admin/sell/create', [SellController::class, 'create']);
Route::get('/admin/sell/view/{id}', [SellController::class, 'view']);
Route::get('/admin/sell/edit/{id}', [SellController::class, 'edit']);
Route::get('/admin/sell/delete/{id}', [SellController::class, 'delete']);

// Admin Order Route
// ************************

Route::get('/admin/orders', [OrderController::class, 'index']);
Route::get('/admin/order/edit/{id}', [OrderController::class, 'edit']);
Route::post('/admin/order/edit/{id}', [OrderController::class, 'update']);
Route::get('/admin/order/delete/{id}', [OrderController::class, 'delete']);


// Admin Inventory Route
// ************************

Route::get('/admin/inventories', [InventoryController::class, 'index']);
Route::post('/admin/inventories', [InventoryController::class, 'filter']);
Route::get('/admin/inventories/category', [InventoryController::class, 'categoryindex']);
Route::post('/admin/inventories/category', [InventoryController::class, 'categoryfilter']);
Route::get('/admin/inventories/brand', [InventoryController::class, 'brandindex']);
Route::post('/admin/inventories/brand', [InventoryController::class, 'brandfilter']);
Route::post('/admin/inventory/edit/{id}', [InventoryController::class, 'update']);
Route::get('/admin/inventory/delete/{id}', [InventoryController::class, 'delete']);

// Admin Report Route
// ************************

Route::get('/admin/report/sell', [ReportController::class, 'sell']);
Route::post('/admin/report/sell', [ReportController::class, 'sellfilter']);
Route::get('/admin/report/due-sell', [ReportController::class, 'dueSell']);
Route::get('/admin/report/product-sell', [ReportController::class, 'product']);
Route::post('/admin/report/product-sell', [ReportController::class, 'productfilter']);
Route::get('/admin/report/purshace', [ReportController::class, 'purshace']);
Route::post('/admin/report/purshace', [ReportController::class, 'purshacefilter']);


// Admin User Route
// ************************

Route::get('/admin/users', [UserController::class, 'index']);
Route::get('/admin/user/create', [UserController::class, 'create']);
Route::post('/admin/user/create', [UserController::class, 'store']);
Route::get('/admin/user/edit/{id}', [UserController::class, 'edit']);
Route::post('/admin/user/edit/{id}', [UserController::class, 'update']);
Route::get('/admin/user/delete/{id}', [UserController::class, 'delete']);

// Admin Backup Route
// ************************

Route::get('/admin/backups', [BackupController::class, 'index']);
Route::get('/admin/backup/create', [BackupController::class, 'store']);
Route::get('/admin/backup/download/{file_name}', [BackupController::class, 'download']);
Route::get('/admin/backup/delete/{file_name}', [BackupController::class, 'delete']);

// Admin Slider Route
// ************************

Route::get('/admin/sliders', [SliderController::class, 'index']);
Route::post('/admin/slider/create', [SliderController::class, 'store']);
Route::get('/admin/slider/edit/{id}', [SliderController::class, 'edit']);
Route::post('/admin/slider/edit/{id}', [SliderController::class, 'update']);
Route::get('/admin/slider/delete/{id}', [SliderController::class, 'delete']);


// Admin Feature Route
// ************************

Route::get('/admin/feature', [FeatureController::class, 'index']);
Route::post('/admin/feature/edit/{id}', [FeatureController::class, 'edit']);

// Admin Setting Route
// ************************

Route::get('/admin/settings', [SettingController::class, 'index']);
Route::post('/admin/setting/edit', [SettingController::class, 'edit']);

// Admin Page Route
// ************************

Route::get('/admin/pages', [PageController::class, 'index']);
Route::post('/admin/page/edit', [PageController::class, 'edit']);

// Admin seo Route
// ************************

Route::get('/admin/seos', [SeoSettingController::class, 'index']);
Route::post('/admin/seo/edit', [SeoSettingController::class, 'edit']);

// Admin Profile Route
// ************************

Route::get('/admin/profile', [ProfileController::class, 'index']);
Route::post('/admin/profile/edit/{id}', [ProfileController::class, 'edit']);