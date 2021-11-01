<?php

namespace App\Http\Controllers\Beer;

use App\Contracts\Services\Beer\BeerServiceInterface;
use App\Contracts\Services\Brewery\BreweryServiceInterface;
use App\Http\Requests\CreateUpdateBeerRequest;
use App\Http\Requests\ImportFileForTableRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/**
 * This is Beer controller.
 */
class BeerController extends Controller
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
     * @return View beer list
     */
    public function showBeerList()
    {
        $beerList = $this->beerServiceInterface->getBeerList();
        return view('beer.index', [
            'beers' => $beerList
        ]);
    }

    /**
     * To show create-beer form
     * @return View beer.create form
     */
    public function createBeerForm() {
        $breweries = $this->breweryServiceInterface->getBreweryList();
        return view('beer.create', [
            'breweries' => $breweries
        ]);
    }

    /**
     * To save beer
     * @param CreateUpdateBeerRequest $request
     * @return View beer list
     */
    public function addBeer(CreateUpdateBeerRequest $request) {
        $validated = $request->validated();
        $beer = $this->beerServiceInterface->addBeer($request);
        return redirect('/beer-list');
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
    
    /**
     * To import file in Beer Table
     * @param ImportFileForTableRequest $request
     * @return View beer list
     */
    public function importBeerFile(ImportFileForTableRequest $request) {
        $validated = $request->validated();
        $message = $this->beerServiceInterface->importBeerFile($request);
        return redirect('/beer-list')->with('message', $message);
    }

    /**
     * To download Beer files
     */
    public function exportBeerFile() {
        return $this->beerServiceInterface->exportBeerFile();  
    }

    /**
     * To show search-beer form
     * @return View beer.search form
     */
    public function searchBeerForm() {
        $breweries = $this->breweryServiceInterface->getBreweryList();
        return view('beer.search', [
            'breweries' => $breweries
        ]);
    }

    /**
     * To search beer datas
     * @param Request $request
     * @return View beer.searched_data
     */
    public function searchBeers(Request $request) {
        $beers =$this->beerServiceInterface->searchBeers($request);
        $breweries = $this->breweryServiceInterface->getBreweryList();
        if($beers == null) {
            $message = "Data is not found !";
        }
        else {
            $message = "Search Successful !";
        }
        return view('beer.searched_data', [
            'beers' => $beers,
            'breweries' => $breweries
        ])->with('message', $message);
    }
}