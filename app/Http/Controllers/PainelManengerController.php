<?php

namespace App\Http\Controllers;

use App\Empresa\Empresa;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class PainelManengerController extends Controller
{
	public function __construct()
   {
      $this->middleware('auth');
   }

	public function perfilUser(){
		$idUser = Auth::id();
		$user = User::find($idUser);
		
		$verificacao = $user->permissions->adm;

		if($verificacao=="sim")
		{
			return view('login.dashboardManenger.perfilAdministrador', compact('user'));
		}
		return redirect()->back();


		
	}
	public function empresas(){
		$idUser = Auth::id();
		$user = User::find($idUser);
		$empresas = Empresa::paginate(5);

		$verificacao = $user->permissions->adm;
			
		if($verificacao=="sim")
		{
			return view('login.dashboardManenger.empresas', compact('user', 'empresas'));
		}
		return redirect()->back();
	}
	public function usuarios(){

		$idUser = Auth::id();
		$user = User::find($idUser);
		
		$verificacao = $user->permissions->adm;
			
		if($verificacao=="sim")
		{
			return view('login.dashboardManenger.usuario', compact('user'));
		}
		return redirect()->back();

	}
	public function contato(){
		$idUser = Auth::id();
		$user = User::find($idUser);
		
		$verificacao = $user->permissions->adm;
			
		if($verificacao=="sim")
		{
			return view('login.dashboardManenger.contato', compact('user'));
		}
		return redirect()->back();


	}
	public function parceria(){
		$idUser = Auth::id();
		$user = User::find($idUser);
		
		$verificacao = $user->permissions->adm;
			
		if($verificacao=="sim")
		{
			return view('login.dashboardManenger.parceria', compact('user'));
		}
		return redirect()->back();

	}
	public function pagamento(){
$idUser = Auth::id();
		$user = User::find($idUser);
		
		$verificacao = $user->permissions->adm;
			
		if($verificacao=="sim")
		{
			return view('login.dashboardManenger.pagamento', compact('user'));
		}
		return redirect()->back();
	}
}
