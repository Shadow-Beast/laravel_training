<?php

namespace App\Services\Brewery;

use App\Contracts\Dao\Brewery\BreweryDaoInterface;
use App\Contracts\Services\Brewery\BreweryServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

/**
 * Service class for brewery.
 */
class BreweryService implements BreweryServiceInterface
{
    /**
     * post dao
     */
    private $breweryDao;
    /**
     * Class Constructor
     * @param BreweryDaoInterface
     * @return
     */
    public function __construct(BreweryDaoInterface $breweryDao)
    {
        $this->breweryDao = $breweryDao;
    }

    /**
     * To get brewery list
     * @return breweryList
     */
    public function getBreweryList() {
        return $this->breweryDao->getBreweryList();
    }

    /**
     * To save brewery
     * @param object $request Validated values from request
     * @return Object created brewery object
     */
    public function addBrewery($request) {    
        return $this->breweryDao->addBrewery($request);
    }

    /**
     * To delete brewery
     * @param string $id brewery id
     * @return string $message message success or not
     */
    public function deleteBrewery($id) {
        return $this->breweryDao->deleteBrewery($id);
    }

    /**
     * To return brewery data
     * @param string $id brewery id
     * @return Object brewery object
     */
    public function getBrewery($id) {
        return $this->breweryDao->getBrewery($id);
    }

    /**
     * To update brewery
     * @param string $id brewery id
     * @param object $request Validated values from request
     * @return Object updated brewery object
     */
    public function updateBrewery($id, $request) {
        return $this->breweryDao->updateBrewery($id, $request);
    }

    /**
     * To import file in Brewery Table
     * @param object $request Validated values from request
     * @return string $message message success or not
     */
    public function importBreweryFile($request) {
        return $this->breweryDao->importBreweryFile($request);
    }

    /**
     * To export breweries.xlsx file from Brewery Table
     */
    public function exportBreweryFile() {
        return $this->breweryDao->exportBreweryFile();
    }
}