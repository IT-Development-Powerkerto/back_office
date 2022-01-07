<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FbPController;
use App\Http\Controllers\ClosingRateController;
use App\Http\Controllers\OmsetController;
use App\Http\Controllers\UpsellingController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('lead/{campaign}/{product}', [FbPController::class, 'lead'])->name('lead');
Route::post('lead_wa/{campaign}/{product}', [FbPController::class, 'lead_wa'])->name('lead_wa');
Route::post('closing_rate/{user}', [ClosingRateController::class, 'closing_rate'])->name('closing_rate');
Route::post('closing_rates/{campaign}/{product}/{user}', [ClosingRateController::class, 'closing_rates'])->name('closing_rates');
Route::post('omset/{campaign}/{product}/{user}', [OmsetController::class, 'omset'])->name('omset');
Route::post('upselling/{campaign}/{product}/{user}', [UpsellingController::class, 'upselling'])->name('upselling');
