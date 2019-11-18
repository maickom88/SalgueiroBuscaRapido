<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Empresa\Empresa;

class IndexController extends Controller
{
   public function index()
   {
		$empresa = Empresa::where('status', 'ativa')->get();
		$userId = Auth::user()->id;
		$user = User::find($userId);
		return view('home.index', compact('empresa', 'user'));
	}
	public function login(){
		if(Auth::check())
		{
			$user = new User();
			$userID = Auth::user()->id;
			$validEmp = $user->find($userID)->permissions->empresario;
			if($validEmp=='sim')
					{
							return redirect()->intended(route('painel'));
					}
			return redirect()->route('dashboard');
		}

		return view('login.login');
	}
	public function cadastro(){
		if(Auth::check())
		{
			return redirect()->route('dashboard');
		}   
		return view('cadastro.logar');
	}
	public function contato(){

		return view('contato.contato');
	}
}
