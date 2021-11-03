<?php

namespace App\Http\Controllers\API\Beer;

use Illuminate\Http\Request;
use App\Contracts\Services\Beer\BeerServiceInterface;
use App\Contracts\Services\Brewery\BreweryServiceInterface;
use App\Http\Requests\CreateUpdateBeerRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\ImportFileForTableRequest;

class BeerAPIController extends Controller
{
    /**
    * beer interface
    */
   private $beerServiceInterface;

   /**
    * brewery interface
    */
   private $breweryServiceInterface;

   /**
    * Create a new controller instance.
    *
    * @return void
    */
   public function __construct(BeerServiceInterface $beerServiceInterface, BreweryServiceInterface $breweryServiceInterface)
   {
       $this->beerServiceInterface = $beerServiceInterface;
       $this->breweryServiceInterface = $breweryServiceInterface;
   }

   /**
    * To show beer list
    * @return Response json with beer list
    */
   public function showBeerList()
   {
       $beerList = $this->beerServiceInterface->getBeerList();
       return response()->json($beerList);
   }

   /**
    * To show create-beer form
    * @return Response json with brewery list
    */
   public function createBeerForm() {
       $breweries = $this->breweryServiceInterface->getBreweryList();
       return response()->json($breweries);
   }

   /**
    * To save beer
    * @param CreateUpdateBeerRequest $request
    * @return View beer list
    */
   public function addBeer(CreateUpdateBeerRequest $request) {
       $validated = $request->validated();
       $beer = $this->beerServiceInterface->addBeer($request);
       return response()->json($beer);
   }

   /**
    * To view beer
    * @param string $id beer id
    * @return View brewery.view form
    */
   public function viewBeerForm($id) {
       $beer = $this->beerServiceInterface->getBeer($id);
       $brewery = $this->breweryServiceInterface->getBrewery($beer->brewery_id);
       return view('beer.view', [
           'beer' => $beer,
           'brewery' => $brewery
       ]);
   }

   /**
    * To delete beer
    * @param string $id beer id
    * @return View beer list
    */
   public function deleteBeer($id) {
       $message = $this->beerServiceInterface->deleteBeer($id);
       return redirect('/beer-list')->with('message', $message);
   }

   /**
    * To show update-beer form
    * @param string $id beer id
    * @return View beer.update form
    */
   public function updateBeerForm($id) {
       $beer = $this->beerServiceInterface->getBeer($id);
       $breweries = $this->breweryServiceInterface->getBreweryList();
       return view('beer.update', [
           'beer' => $beer,
           'breweries' => $breweries
       ]);
   }

   /**
    * To update beer
    * @param string $id beer id
    * @param CreateUpdateBeerRequest $request
    * @return View beer list
    */
   public function updateBeer($id, CreateUpdateBeerRequest $request) {
       $validated = $request->validated();
       $beer = $this->beerServiceInterface->updateBeer($id, $request);
       return redirect('/beer-list');
   }
}
