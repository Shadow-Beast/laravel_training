<?php

namespace App\Http\Controllers\Brewery;

use App\Contracts\Services\Brewery\BreweryServiceInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateUpdateBreweryRequest;
use App\Http\Requests\ImportFileForTableRequest;
use Illuminate\Http\Request;

/**
 * This is Brewery controller.
 */
class BreweryController extends Controller
{
    /**
     * brewery interface
     */
    private $breweryServiceInterface;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(BreweryServiceInterface $breweryServiceInterface)
    {
        $this->breweryServiceInterface = $breweryServiceInterface;
    }

    /**
     * To show brewery list
     * @return View brewery list
     */
    public function showBreweryList()
    {
        $breweryList = $this->breweryServiceInterface->getBreweryList();
        return view('brewery.index', [
            'breweries' => $breweryList
        ]);
    }

    /**
     * To show create-brewery form
     * @return View brewery.create form
     */
    public function createBreweryForm() {
        return view('brewery.create');
    }

    /**
     * To add brewery
     * @param CreateUpdateBreweryRequest $request
     * @return View brewery list
     */
    public function addBrewery(CreateUpdateBreweryRequest $request) {
        $validated = $request->validated();
        $brewery = $this->breweryServiceInterface->addBrewery($request);
        return redirect('/');
    }

    /**
     * To view brewery
     * @param string $id brewery id
     * @return View brewery.view form
     */
    public function viewBreweryForm($id) {
        $brewery = $this->breweryServiceInterface->getBrewery($id);
        return view('brewery.view', [
            'brewery' => $brewery
        ]);
    }

    /**
     * To delete brewery
     * @param string $id brewery id
     * @return View brewery list
     */
    public function deleteBrewery($id) {
        $message = $this->breweryServiceInterface->deleteBrewery($id);
        return redirect('/')->with('message', $message);
    }

    /**
     * To show update-brewery form
     * @param string $id brewery id
     * @return View brewery.update form
     */
    public function updateBreweryForm($id) {
        $brewery = $this->breweryServiceInterface->getBrewery($id);
        return view('brewery.update', [
            'brewery' => $brewery
        ]);
    }

    /**
     * To update brewery
     * @param string $id brewery id
     * @param CreateUpdateBreweryRequest $request
     * @return View brewery list
     */
    public function updateBrewery($id, CreateUpdateBreweryRequest $request) {
        $validated = $request->validated();
        $brewery = $this->breweryServiceInterface->updateBrewery($id, $request);
        return redirect('/');
    }

    /**
     * To import file in Brewery Table
     * @param ImportFileForTableRequest $request
     * @return View brewery list
     */
    public function importBreweryFile(ImportFileForTableRequest $request) {
        $validated = $request->validated();
        $message = $this->breweryServiceInterface->importBreweryFile($request);
        return redirect('/')->with('message', $message);
    }

    /**
     * To download Brewery files
     */
    public function exportBreweryFile() {
        return $this->breweryServiceInterface->exportBreweryFile();
    }
}