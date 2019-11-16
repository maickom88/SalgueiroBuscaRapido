<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Empresa\Empresa;

class PaginaIndividualController extends Controller
{
   public function page($nome, $id){
		$empresa = Empresa::find($id);
		return view('paginaIndividual.page', compact('empresa'));
	}
}
