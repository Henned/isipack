<?php

use App\Http\Livewire\Home;
use App\Http\Livewire\Shop;
use App\Http\Livewire\Details;
use App\Http\Livewire\Checkout;
use App\Http\Livewire\Distance;
use App\Http\Livewire\Thankyou;
use App\Http\Controllers\Import;
use App\Http\Livewire\Admin\Stats;
use App\Http\Livewire\Admin\Upload;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Admin\Dashboard;
use App\Http\Livewire\SearchComponent;
use App\Http\Controllers\ExcelController;
use App\Http\Livewire\Admin\OrderDetails;
use App\Http\Livewire\User\UserDashboard;
use App\Http\Livewire\Admin\AdminProducts;
use App\Http\Livewire\Admin\AdminProductsEdit;

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

Route::middleware('visitor')->group(function () {
    Route::get('/', Home::class)->name('home');
    Route::get('/shop', Shop::class)->name('shop');
    Route::get('/p/{slug}', Details::class)->name('product.details');
    Route::get('/distance', Distance::class)->name('distance');
    Route::get('/checkout', Checkout::class)->name('checkout');
    Route::get('/search', SearchComponent::class)->name('product.search');
    Route::get('/dashboard', Home::class)->name('dashboard');
    Route::get('/thankyou', Thankyou::class)->name('thankyou');
});

Route::middleware(['auth:sanctum', 'verified'])->prefix('user')->group(function () {
    Route::get('/dashboard', UserDashboard::class)->name('user.dashboard');
});


Route::middleware(['auth:sanctum', 'verified', 'role:admin'])->prefix('admin')->group(function () {
    Route::post('/import', [ExcelController::class, 'import'])->name('excel.upload');
    Route::get('/export', [ExcelController::class, 'export'])->name('excel.export');
    Route::get('/upload', Upload::class)->name('admin.upload');
    Route::get('/stats', Stats::class)->name('admin.stats');
    Route::get('/dashboard', Dashboard::class)->name('admin.dashboard');
    Route::get('/order/{id}', OrderDetails::class)->name('admin.details');
    Route::get('/products', AdminProducts::class)->name('admin.products');
    Route::get('/product/edit/{product_slug}', AdminProductsEdit::class)->name('admin.editproduct');
});
