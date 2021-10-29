<?php

namespace App\Contracts\Services\Brewery;
use Illuminate\Http\Request;

/**
 * Interface for brewery service
 */
interface BreweryServiceInterface
{
    /**
     * To get brewery list
     * @return breweryList
     */
    public function getBreweryList();

    /**
     * To save brewery
     * @param object $request Validated values from request
     * @return Object created brewery object
     */
    public function addBrewery($request);

    /**
     * To delete brewery
     * @param string $id brewery id
     * @return string $message message success or not
     */
    public function deleteBrewery($id);

    /**
     * To return brewery data
     * @param string $id brewery id
     * @return Object brewery object
     */
    public function getBrewery($id);

    /**
     * To update brewery
     * @param string $id brewery id
     * @param object $request Validated values from request
     * @return Object updated brewery object
     */
    public function updateBrewery($id, $request);
}