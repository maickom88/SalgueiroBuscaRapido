<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BuscasOnSite\Search;
use DateTime;
use App\Empresa\Empresa;
use App\User;
use Illuminate\Support\Facades\Auth;


class ResultSearchController extends Controller
{
    public function result(Request $searchSite){
        $idUser = Auth::id();
		$user = User::find($idUser);
        date_default_timezone_set('America/Recife');
        $dateTime = date('Y/m/d');
        $search = new Search();
        if(empty($searchSite->input('search-item'))){
             $search->busca = 'null';
        }
        else{
            $search->busca = $searchSite->input('search-item');
        }
        $search->filtro = $searchSite->input('select-option');
        $search->data_pesquisa = $dateTime ;
        $search->save();
        $option = $searchSite->input('select-option');
        if($option == 'todos'){
            $empresas = Empresa::where('tags', 'LIKE', '%' .$searchSite->input('search-item'). '%')->get();
        }
        else if(empty($searchSite->input('search-item'))){
            $empresas = Empresa::where('nincho', 'LIKE', '%'.$searchSite->input('select-option').'%')->get();
        }
        else{
            $empresas = Empresa::where('nincho', 'LIKE', '%' .$searchSite->input('select-option'). '%')->where('tags', 'LIKE', '%'.$searchSite->input('search-item').'%')->get();
        }
        return view('busca.buscarSite', compact('empresas', 'user'));

    }
}
