<?php

use App\Http\Livewire\Home;
use App\Http\Livewire\Shop;
use App\Http\Livewire\Upload;
use App\Http\Livewire\Details;
use App\Http\Livewire\Checkout;
use App\Http\Livewire\Thankyou;
use App\Http\Controllers\Import;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Admin\Dashboard;
use App\Http\Livewire\SearchComponent;

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

Route::get('/', Home::class)->name('home');
Route::get('/shop', Shop::class)->name('shop');
Route::get('/p/{slug}', Details::class)->name('product.details');
Route::get('/checkout', Checkout::class)->name('checkout');
Route::get('/search', SearchComponent::class)->name('product.search');
Route::get('/dashboard', Home::class)->name('dashboard');
Route::get('/thankyou', Thankyou::class)->name('thankyou');



Route::prefix('admin')->group(function () {
    Route::middleware(['auth:sanctum', 'verified'])->post('/create', [Import::class, 'create'])->name('excel.upload');
    Route::middleware(['auth:sanctum', 'verified'])->get('/upload', Upload::class)->name('admin.upload');
    Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', Dashboard::class)->name('admin.dashboard');
});