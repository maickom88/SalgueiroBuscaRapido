<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Empresa\Empresa;
use App\pageView\View;

class IndexController extends Controller
{
   public function index()
   {
		$empresa = Empresa::where('status', 'ativa')->get();
		$view = new View;
		
		foreach($empresa as $emp){
			
			$emp->views->views++;
			$emp->views->save();
			
		}

		if (Auth::check()) {
    		$userId = Auth::user()->id;
			 $user = User::find($userId);
		return view('home.index', compact('empresa', 'user'));
		}
		return view('home.index', compact('empresa'));
		
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
		if(Auth::check()){
			$idUser = Auth::user()->id;$user = User::find($idUser);
		
		return view('contato.contato', compact('user'));
		}
		return view('contato.contato');
	}
}
