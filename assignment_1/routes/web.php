<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Brewery\BreweryController;
use App\Http\Controllers\Beer\BeerController;

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

//Brewery
/**
 * Display All Breweries
 */
Route::get('/', [BreweryController::class, 'showBreweryList']);

/**
 * Display Create-Brewery Form
 */
Route::get('/create-brewery', [BreweryController::class, 'createBreweryForm']);

/**
 * Add A New Brewery
 */
Route::post('/brewery', [BreweryController::class, 'addBrewery']);

/**
 * View An Existing Brewery
 */
Route::get('/view-brewery/{id}', [BreweryController::class, 'viewBreweryForm']);

/**
 * Delete An Existing Brewery
 */
Route::delete('/delete-brewery/{id}', [BreweryController::class, 'deleteBrewery']);

/**
 * Display Update-Brewery Form
 */
Route::get('/update-brewery/{id}', [BreweryController::class, 'updateBreweryForm']);

/**
 * Update An Existing Brewery
 */
Route::post('/brewery/{id}', [BreweryController::class, 'updateBrewery']);


//Beer
/**
 * Display All Beers
 */
Route::get('/beer-list', [BeerController::class, 'showBeerList']);

/**
 * Display Create-Beer Form
 */
Route::get('/create-beer', [BeerController::class, 'createBeerForm']);

/**
 * Add A New Beer
 */
Route::post('/beer', [BeerController::class, 'addBeer']);

/**
 * View An Existing beer
 */
Route::get('/view-beer/{id}', [BeerController::class, 'viewBeerForm']);

/**
 * Delete An Existing Beer
 */
Route::delete('/delete-beer/{id}', [BeerController::class, 'deleteBeer']);

/**
 * Display Update-Beer Form
 */
Route::get('/update-beer/{id}', [BeerController::class, 'updateBeerForm']);

/**
 * Update An Existing Beer
 */
Route::post('/beer/{id}', [BeerController::class, 'updateBeer']);