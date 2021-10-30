<?php

namespace App\Services\Beer;

use App\Contracts\Dao\Beer\BeerDaoInterface;
use App\Contracts\Services\Beer\BeerServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

/**
 * Service class for beer.
 */
class BeerService implements BeerServiceInterface
{
    /**
     * post dao
     */
    private $beerDao;
    /**
     * Class Constructor
     * @param BeerDaoInterface
     * @return
     */
    public function __construct(BeerDaoInterface $beerDao)
    {
        $this->beerDao = $beerDao;
    }

    /**
     * To get beer list
     * @return beerList
     */
    public function getBeerList() {
        return $this->beerDao->getBeerList();
    }

    /**
     * To save beer
     * @param object $request Validated values from request
     * @return Object created beer object
     */
    public function addBeer($request) {
        return $this->beerDao->addBeer($request);
    }    

    /**
     * To delete beer
     * @param string $id beer id
     * @return string $message message success or not
     */
    public function deleteBeer($id) {
        return $this->beerDao->deleteBeer($id);
    }

    /**
     * To return beer data
     * @param string $id beer id
     * @return Object beer object
     */
    public function getBeer($id) {
        return $this->beerDao->getBeer($id);
    }

    /**
     * To update beer
     * @param string $id beer id
     * @param object $request Validated values from request
     * @return Object updated beer object
     */
    public function updateBeer($id, $request) {
        return $this->beerDao->updateBeer($id, $request);
    }  

    /**
     * To import file in Beer Table
     * @param object $request Validated values from request
     * @return string $message message success or not
     */
    public function importBeerFile($request) {
        return $this->beerDao->importBeerFile($request);
    } 
    
    /**
     * To export beers.xlsx file from Beer Table
     */
    public function exportBeerFile() {
        return $this->beerDao->exportBeerFile();
    }
}