<?php

namespace App\Http\Controllers;

use App\Contracts\Services\Beer\BeerServiceInterface;
use App\Mail\FileMail;
use App\Mail\TextMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    /**
     * beer interface
     */
    private $beerServiceInterface;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(BeerServiceInterface $beerServiceInterface)
    {
        $this->beerServiceInterface = $beerServiceInterface;
    }

    /**
     * To send mail with title and body text
     * @return View brewery list
     */
    public function sendText(Request $request) {
        $data = [
            "title" => $request->title, 
            "bodyText" => $request->bodyText
        ];
        
        Mail::to($request->email)->send(new TextMail($data));
        return redirect('/');
    }

    /**
     * To send mail with file
     * @return View brewery list
     */
    public function sendFile(Request $request) { 
        $beerList = $this->beerServiceInterface->exportBeerFile();        
        Mail::to($request->email)->send(new FileMail($beerList));
        return redirect('/');
    }
}
