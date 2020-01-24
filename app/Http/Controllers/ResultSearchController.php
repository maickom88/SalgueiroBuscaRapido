<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BuscasOnSite\Search;
use DateTime;

class ResultSearchController extends Controller
{
    public function result($searchSite){
        date_default_timezone_set('America/Los_Angeles');
        $dateTime = new DateTime();
        $search = new Search();
        $search->busca = $searchSite->input('search-item');
        $search->filtro = $searchSite->input('select-option');
        $search->data_pesquisa = $dateTime ;
        $search->save();

        return view('busca.buscarSite');

    }
}
