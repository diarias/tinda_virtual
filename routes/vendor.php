<?php

use App\Http\Controllers\Backend\VendorController;
use App\Http\Controllers\Backend\VendorMessageController;
use App\Http\Controllers\Backend\VendorOrderController;
use App\Http\Controllers\Backend\VendorProductController;
use App\Http\Controllers\Backend\VendorProductImageGalleryController;
use App\Http\Controllers\Backend\VendorProductReviewController;
use App\Http\Controllers\Backend\VendorProductVariantController;
use App\Http\Controllers\Backend\VendorProductVariantItemController;
use App\Http\Controllers\Backend\VendorProfileController;
use App\Http\Controllers\Backend\VendorShopProfileController;
use App\Http\Controllers\Backend\VendorWithdrawController;
use Illuminate\Support\Facades\Route;


Route::get('dashboard',[VendorController::class,'dashboard'])->name('dashboard');
Route::get('profile',[VendorProfileController::class,'index'])->name('profile');
Route::put('profile', [VendorProfileController::class, 'updateProfile'])->name('profile.update');
Route::post('profile', [VendorProfileController::class, 'updatePassword'])->name('profile.update.password');

/** Message Route */
Route::get('messages', [VendorMessageController::class, 'index'])->name('messages.index');
Route::post('send-message', [VendorMessageController::class, 'sendMessage'])->name('send-message');
Route::get('get-messages', [VendorMessageController::class, 'getMessages'])->name('get-messages');
/**vendor shop profile */
Route::resource('shop-profile',VendorShopProfileController::class);

/**vendor product */
Route::get('product/get-subcategories', [VendorProductController::class,'getSubCategories'])->name('product.get-subcategories');
Route::get('product/get-childcategories', [VendorProductController::class,'getChildCategories'])->name('product.get-childcategories');
Route::put('product/change-status', [VendorProductController::class, 'changeStatus'])->name('product.change-status');
Route::resource('products',VendorProductController::class);

/** Products image gallery route */
Route::resource('products-image-gallery', VendorProductImageGalleryController::class);

/** Products variants route */
Route::put('products-variant/change-status', [VendorProductVariantController::class, 'changeStatus'])->name('products-variant.change-status');
Route::resource('products-variant', VendorProductVariantController::class);

/** Products variants item route */
Route::get('products-variant-item/{productId}/{variantId}', [VendorProductVariantItemController::class,'index'])->name('products-variant-item.index');
Route::get('products-variant-item/create/{productId}/{variantId}', [VendorProductVariantItemController::class,'create'])->name('products-variant-item.create');
Route::post('products-variant-item', [VendorProductVariantItemController::class,'store'])->name('products-variant-item.store');
Route::get('products-variant-item-edit/{variantItemId}', [VendorProductVariantItemController::class,'edit'])->name('products-variant-item.edit');
Route::put('products-variant-item-update/{variantItemId}', [VendorProductVariantItemController::class,'update'])->name('products-variant-item.update');
Route::delete('products-variant-item/{variantItemId}', [VendorProductVariantItemController::class,'destroy'])->name('products-variant-item.destroy');
Route::put('products-variant-item-status', [VendorProductVariantItemController::class,'changeStatus'])->name('products-variant-item.changeStatus');

/** order routes */
Route::get('orders', [VendorOrderController::class, 'index'])->name('orders.index');
Route::get('orders/show/{id}', [VendorOrderController::class, 'show'])->name('orders.show');
Route::get('orders/status/{id}', [VendorOrderController::class, 'orderStatus'])->name('orders.status');

/** Reviews route */
Route::get('reviews', [VendorProductReviewController::class, 'index'])->name('reviews.index');

/** Withdraw route */
Route::get('withdraw-request/{id}', [VendorWithdrawController::class, 'showRequest'])->name('withdraw-request.show');

Route::resource('withdraw', VendorWithdrawController::class);