<?php

namespace App\Dao\Beer;

use App\Models\Beer;
use App\Contracts\Dao\Beer\BeerDaoInterface;
use App\Exports\BeersExport;
use App\Imports\BeersImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/**
 * Data accessing object for beer
 */
class BeerDao implements BeerDaoInterface
{
    /**
     * To get beer list
     * @return beerList
     */
    public function getBeerList() {
        $beerList = Beer::orderBy('created_at', 'asc')->get();
        return $beerList;
    }

    /**
     * To save beer
     * @param object $request Validated values from request
     * @return Object created beer object
     */
    public function addBeer($request) {    
        $beer = new Beer;
        $beer->name = $request->name;
        $beer->brewery_id = $request->brewery_id;
        $beer->abv =  $request->abv;
        $beer->ibu =  $request->ibu;
        $beer->style = $request->style;
        $beer->ounces = $request->ounces;
        $beer->save();
        return $beer;
    }

    /**
     * To return beer data
     * @param string $id beer id
     * @return Object beer object
     */
    public function getBeer($id) {
        $beer = Beer::findOrFail($id);
        return $beer;
    }

    /**
     * To delete beer
     * @param string $id beer id
     * @return string $message message success or not
     */
    public function deleteBeer($id) {
        Beer::findOrFail($id)->delete();
        return 'Delete Complete!';
    }

    /**
     * To update beer
     * @param string $id beer id
     * @param object $request Validated values from request
     * @return Object updated beer object
     */
    public function updateBeer($id, $request) {
        $beer = Beer::findOrFail($id);
        $beer->name = $request->name;
        $beer->brewery_id = $request->brewery_id;
        $beer->abv =  $request->abv;
        $beer->ibu =  $request->ibu;
        $beer->style = $request->style;
        $beer->ounces = $request->ounces;
        $beer->save();
        return $beer;
    }

    /**
     * To import file in Beer Table
     * @param object $request Validated values from request
     * @return string $message message success or not
     */
    public function importBeerFile($request) {
        Excel::import(new BeersImport, $request->file('file'));
        return 'The file imported successfully!';
    }

    /**
     * To export beers.xlsx file from Beer Table
     */
    public function exportBeerFile() {
        return Excel::download(new BeersExport, 'beers.xlsx');
    }

    /**
     * To To search beer datas
     * @param object $request Validated values from request
     * @return beers
     */
    public function searchBeers($request) {
        $beers = DB::select( DB::raw("SELECT * FROM beers WHERE 
                                      brewery_id = :brewery_id AND
                                      abv = :abv AND
                                      ibu = :ibu AND
                                      name = :name AND
                                      style = :style AND
                                      ounces = :ounces AND
                                      created_at >= :start_date AND
                                      created_at < :end_date"), array(
                                      'brewery_id' => $request->brewery_id,
                                      'abv' => $request->abv,
                                      'ibu' => $request->ibu,
                                      'name' => $request->name,
                                      'style' => $request->style,
                                      'ounces' => $request->ounces,
                                      'start_date' => $request->start_date,
                                      'end_date' => $request->end_date,
                ));
        return $beers;
    }
}