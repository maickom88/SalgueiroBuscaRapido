<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Noticia;


class BlogController extends Controller
{
    public function index(){

        $dados = Noticia::all();
        
        
         
       
        return view('noticias.noticias',compact('dados'));
    }
    public function artigo(Request $titulo, $id)
    {
        $pagina = $id;
        return view('noticias.blog',compact('pagina'));
    }

    public function converte($titulo){

        $str = $titulo;

// Trocando todas ocorrencias de "exemplo" por "teste"
$str2 = str_replace('%', '-', $str);

        return $str2;
    }
}
