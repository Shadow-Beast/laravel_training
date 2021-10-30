<?php

namespace App\Contracts\Dao\Beer;

use Illuminate\Http\Request;

/**
 * Interface for Data Accessing Object of Beer
 */
interface BeerDaoInterface
{
    /**
     * To get beer list
     * @return beerList
     */
    public function getBeerList();

    /**
     * To save beer
     * @param object $request Validated values from request
     * @return Object created beer object
     */
    public function addBeer($request);

    /**
     * To return beer data
     * @param string $id beer id
     * @return Object beer object
     */
    public function getBeer($id);

    /**
     * To delete beer
     * @param string $id beer id
     * @return string $message message success or not
     */
    public function deleteBeer($id);

    /**
     * To update beer
     * @param string $id beer id
     * @param object $request Validated values from request
     * @return Object updated beer object
     */
    public function updateBeer($id, $request);

    /**
     * To import file in Beer Table
     * @param object $request Validated values from request
     * @return string $message message success or not
     */
    public function importBeerFile($request);

    /**
     * To export beers.xlsx file from Beer Table
     */
    public function exportBeerFile();
}