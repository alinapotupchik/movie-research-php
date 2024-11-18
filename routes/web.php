<?php declare(strict_types=1);

use App\Http\Controllers\Sale\SaleController;
use Illuminate\Support\Facades\Route;

Route::prefix('/sales')->group(function () {
    Route::get('', [SaleController::class, 'showForm'])->name('sale.show');
    Route::post('', [SaleController::class, 'getTopSaleByDate']);
});
