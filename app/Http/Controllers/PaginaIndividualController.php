<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Empresa\Empresa;

class PaginaIndividualController extends Controller
{
   public function page($nome, $id){
		$empresa = Empresa::find($id);
		$tag = $empresa->tags;
		$tags = explode(',', $tag);

		$segunda = "".$empresa->open->segunda."";
		$terca = $empresa->open->terca;
		$quarta = $empresa->open->quarta;
		$quinta = $empresa->open->quinta;
		$sexta = $empresa->open->sexta;
		$sabado = $empresa->open->sabado;
		$domingo = $empresa->open->domingo;
		
			$segundatoJson = json_decode($segunda);
			$tercatoJson = json_decode($terca);
			$quartatoJson = json_decode($quarta);
			$segundatoJson = json_decode($segunda);
			$segundatoJson = json_decode($segunda);


	$horarios = array($segunda, $terca, $quarta, $quinta, $sexta, $sabado, $domingo);
	$horariosJson = json_encode($horarios);
		return view('paginaIndividual.page', compact('empresa', 'tags', 'segundatoJson'));
	}
}
