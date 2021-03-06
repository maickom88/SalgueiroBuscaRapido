<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Empresa\Empresa;
use App\Evento\Evento;
use App\pageView\View;
use App\Post\Post;
use App\Empresa\Promotion\Promotion;

class IndexController extends Controller
{
   public function index()
   {
        $empresa = Empresa::where('status', 'ativa')->count();
        if($empresa > 6){
            $empresa = Empresa::where('status','ativa')->get()->random(6);
        }else
        {
            $empresa = Empresa::where('status', 'ativa')->get();
        }

        $posts = Post::orderBy('id','desc')->limit(3)->get();
			$view = new View;
		$promotions = Promotion::where('status','sim')->orderBy('id','desc')->get();
		foreach($empresa as $emp){

			$emp->views->views++;
			$emp->views->save();

		}

        if (Auth::check()) {
            $userId = Auth::user()->id;
            $user = User::find($userId);
		return view('home.index', compact('empresa', 'user','posts','promotions'));
		}
		return view('home.index', compact('empresa', 'posts','promotions'));

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
    public function eventos(){
        $eventos = Evento::orderBy('id', 'desc')->paginate(6);
        if(Auth::check()){
			$idUser = Auth::user()->id;$user = User::find($idUser);

		return view('eventos.eventos', compact('user','eventos'));
		}
		return view('eventos.eventos', compact('eventos'));
    }
    public function noticias(){

        if(Auth::check()){
			$idUser = Auth::user()->id;$user = User::find($idUser);

		return view('noticias.noticias', compact('user' ));
		}
		return view('noticias.noticias',);
    }

}
