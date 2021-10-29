<?php

namespace App\Dao\Brewery;

use App\Models\Brewery;
use App\Contracts\Dao\Brewery\BreweryDaoInterface;
use Illuminate\Http\Request;

/**
 * Data accessing object for brewery
 */
class BreweryDao implements BreweryDaoInterface
{
    /**
     * To get brewery list
     * @return breweryList
     */
    public function getBreweryList() {
        $breweryList = Brewery::orderBy('created_at', 'asc')->get();
        return $breweryList;
    }

    /**
     * To save brewery
     * @param object $request Validated values from request
     * @return Object created brewery object
     */
    public function addBrewery($request) {    
        $brewery = new Brewery;
        $brewery->name = $request->name;
        $brewery->city = $request->city;
        $brewery->state = $request->state;
        $brewery->save();
        return $brewery;
    }

    /**
     * To delete brewery
     * @param string $id brewery id
     * @return string $message message success or not
     */
    public function deleteBrewery($id) {
        Brewery::findOrFail($id)->delete();
        return 'Delete Complete!';
    }

    /**
     * To return brewery data
     * @param string $id brewery id
     * @return Object brewery object
     */
    public function getBrewery($id) {
        $brewery = Brewery::findOrFail($id);
        return $brewery;
    }

    /**
     * To update brewery
     * @param string $id brewery id
     * @param object $request Validated values from request
     * @return Object updated brewery object
     */
    public function updateBrewery($id, $request) {
        $brewery = Brewery::findOrFail($id);
        $brewery->name = $request->name;
        $brewery->city = $request->city;
        $brewery->state = $request->state;
        $brewery->save();
        return $brewery;
    }
}