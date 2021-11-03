<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Brewery\BreweryController;
use App\Http\Controllers\Beer\BeerController;
use App\Http\Controllers\ExportController;

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

/**
 * Import Breweries file
 */
Route::post('/import-breweries', [BreweryController::class, 'importBreweryFile']);

/**
 * Export Breweries file
 */
Route::get('/download-breweries', [BreweryController::class, 'exportBreweryFile']);


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

/**
 * Import Beer file
 */
Route::post('/import-beers', [BeerController::class, 'importBeerFile']);

/**
 * Export Beer file
 */
Route::get('/download-beers', [BeerController::class, 'exportBeerFile']);

/**
 * Display Search-Beer Form
 */
Route::get('/search', [BeerController::class, 'searchBeerForm']);

/**
 * Search Beers
 */
Route::post('/search-beer', [BeerController::class, 'searchBeers']);

//API
/**
 * Display All Beers
 */
Route::get('/api_view/beer-list', function() {
    return view('beer.api.index');
});

/**
 * Display Create-Beer Form
 */
Route::get('/api_view/create-beer', function() {
    return view('beer.api.create');
});

/**
 * Display Update-Beer Form
 */
Route::get('/api_view/update-beer/{id}', function() {
    return view('beer.api.update');
});

/**
 * View An Existing beer
 */
Route::get('/api_view/view-beer/{id}', function() {
    return view('beer.api.view');
});