<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\Beer\BeerAPIController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Beer
/**
 * Display All Beers
 */
Route::get('/beer-list', [BeerAPIController::class, 'showBeerList']);

/**
 * Display Create-Beer Form
 */
Route::get('/create-beer', [BeerAPIController::class, 'createBeerForm']);

/**
 * Add A New Beer
 */
Route::post('/beer', [BeerAPIController::class, 'addBeer']);

/**
 * View An Existing beer
 */
Route::get('/view-beer/{id}', [BeerAPIController::class, 'viewBeerForm']);

/**
 * Delete An Existing Beer
 */
Route::delete('/delete-beer/{id}', [BeerAPIController::class, 'deleteBeer']);

/**
 * Display Update-Beer Form
 */
Route::get('/update-beer/{id}', [BeerAPIController::class, 'updateBeerForm']);

/**
 * Update An Existing Beer
 */
Route::post('/beer/{id}', [BeerAPIController::class, 'updateBeer']);