<?php

namespace App\Http\Controllers\ControllersApi;

use App\Evento\Evento;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth;

class EventoController extends Controller
{

    public function eventos(Request $request){
        $eventos = Evento::orderBy('id', 'desc')->paginate(6);
		if(Auth::check()){
			$idUser = Auth::user()->id;$user = User::find($idUser);

		return view('eventos.eventoPaginate', compact('user','eventos'));
		}
		return view('eventos.eventoPaginate', compact('eventos'));
	}
    public function listarEventosPublicados(Request $request){
        $eventos = Evento::orderBy('id', 'desc')->paginate(5);
		if(Auth::check()){
			$idUser = Auth::user()->id;
            $user = User::find($idUser);
		return view('login.dashboardManenger.eventosTabela', compact('user','eventos'));
		}
		return view('login.dashboardManenger.eventosTabela', compact('eventos'));
	}
    public function buscarEventos(Request $request){
        $eventos = Evento::all();
        $todas = "MostrarTodas";
		if(Auth::check()){
			$idUser = Auth::user()->id;
            $user = User::find($idUser);
		return view('login.dashboardManenger.eventosTabela', compact('user','eventos','todas'));
		}
		return view('login.dashboardManenger.eventosTabela', compact('eventos','todas'));
	}
    public function excluirEventos(Request $dados){
        $id = $dados->input('IdUser');
        $evento = Evento::find($id);
        $valid = $evento->delete();
        return response()->json($valid);
    }

}
