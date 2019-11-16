<?php

namespace App\Http\Controllers;
use App\Parceiro;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ParceriaController extends Controller
{
	public function send(Request $dados)
		{
			$idUser = Auth::id();
			$parceiro = new Parceiro();
			$parceiro->user_id = $idUser;
			$parceiro->pedidos = $dados->input('pedido');
			$saved = $parceiro->save();
			
			if($saved){
				session()->put('parc_send','sim');
            return redirect()->back();	
			}
			session()->put('parc_send_fail','sim');
         return redirect()->back();	

		}    
}
