<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Empresa\Empresa;
use App\Empresa\Feed\NovidadeEmpresa;
use App\User;
use Illuminate\Support\Facades\Auth;

class PaginaIndividualController extends Controller
{
   public function page($nome, $id){
		$empresas = Empresa::all()->where('status', 'ativa')->random(4);
		$empresa = Empresa::find($id);
		$novidades = NovidadeEmpresa::where('empresa_id', $id)->orderBy('id','desc')->paginate(1);
		if(!isset($empresa)){
			return 'Erro';
		}
		$tag = $empresa->tags;
		$tags = explode(',', $tag);
		
		
		$segunda = "".$empresa->open->segunda."";
		$terca = $empresa->open->terca;
		$quarta = $empresa->open->quarta;
		$quinta = $empresa->open->quinta;
		$sexta = $empresa->open->sexta;
		$sabado = $empresa->open->sabado;
		$domingo = $empresa->open->domingo;

		if($segunda=='Fechado'){
			$segundatoJson = 'Fechado';
		}
		else{
			$segundatoJson = json_decode($segunda);
		}
		if($terca=='Fechado'){
			$tercatoJson = 'Fechado';
		}
		else{
			$tercatoJson = json_decode($terca);
		}
		if($quarta=='Fechado'){
			$quartatoJson = 'Fechado';
		}
		else{
			$quartatoJson = json_decode($quarta);
		}
		if($quinta=='Fechado'){
			$quintatoJson = 'Fechado';
		}
		else{
			$quintatoJson = json_decode($quinta);
		}
		if($sexta=='Fechado'){
			$sextatoJson = 'Fechado';
		}
		else{
			$sextatoJson = json_decode($segunda);
		}
		if($sabado=='Fechado'){
			$sabadotoJson = 'Fechado';
		}
		else{
			$sabadotoJson = json_decode($sabado);
		}
		if($domingo=='Fechado'){
			$domingotoJson = 'Fechado';
		}
		else{
			$domingotoJson = json_decode($domingo);
		}
		
		$array = ['segunda' => $segundatoJson,
						'terca'   => $tercatoJson,
						'quarta'  => $quartatoJson,
						'quinta'  => $quintatoJson,
						'sexta'   => $sextatoJson,
						'sabado'  => $sabadotoJson,
						'domingo' => $domingotoJson
		];
		if(Auth::check()){
			$idUser = Auth::user()->id;
			$user = User::find($idUser);
			return view('paginaIndividual.page', compact('empresa', 'tags', 'array', 'user', 'empresas', 'novidades'));
		}
		
		return view('paginaIndividual.page', compact('empresa', 'tags', 'array','empresas' ,'novidades'));
	}
}
