<?php

namespace App\Contracts\Services\Beer;
use Illuminate\Http\Request;

/**
 * Interface for beer service
 */
interface BeerServiceInterface
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
}