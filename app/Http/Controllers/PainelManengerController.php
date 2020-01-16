<?php

namespace App\Http\Controllers;

use App\Empresa\Empresa;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Contact\Contact;
use App\Empresa\Contrato\Contrato;
use App\Empresa\Promotion\Promotion;
use App\Evento\Evento;
use App\Parceiro;
use App\Permission\Permission;

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
			$users = User::orderBy('id', 'desc')->paginate(5);
			return view('login.dashboardManenger.usuarios', compact('user', 'users'));
		}
		return redirect()->back();
	}

	public function contato(){
		$idUser = Auth::id();
		$user = User::find($idUser);

		$verificacao = $user->permissions->adm;
		$contact = Contact::orderBy('id')->paginate(5);
		$parceiro = Parceiro::all()->where('pedidos', 'Desejo ser Parceiro do site!');

		if($verificacao=="sim")
		{
			return view('login.dashboardManenger.contato', compact('user', 'contact', 'parceiro'));
		}
		return redirect()->back();
	}

	public function parceria(){
		$idUser = Auth::id();
		$user = User::find($idUser);

		$verificacao = $user->permissions->adm;

		if($verificacao=="sim")
		{
			$userPer = Permission::where('blogueiro','sim')->get();
			return view('login.dashboardManenger.parceria', compact('userPer','user'));
		}
		return redirect()->back();
	}

	public function pagamento(){
		$idUser = Auth::id();
		$user = User::find($idUser);

		$verificacao = $user->permissions->adm;

		if($verificacao=="sim")
		{
        date_default_timezone_set("Brazil/East");
        $contratosAll = Contrato::all();
        $contratos = Contrato::orderBy('id', 'desc')->paginate(5);
        foreach ($contratosAll as $contrato) {
            $dt_atual = date("Y-m-d"); // data atual
            $timestamp_dt_atual = strtotime($dt_atual); // converte para timestamp Unix
            $dt_expira = $contrato->fim_contrato; // data de expiração do anúncio
            $timestamp_dt_expira = strtotime($dt_expira); // converte para timestamp Unix
            if($timestamp_dt_atual > $timestamp_dt_expira){
                $contrato->status = 'expirado';
                $contrato->save();
            }
        }
			return view('login.dashboardManenger.pagamento', compact('user', 'contratos'));
		}
		return redirect()->back();
	}
    public function evento(){
		$idUser = Auth::id();
		$user = User::find($idUser);
		$verificacao = $user->permissions->adm;

		if($verificacao=="sim")
		{
			return view('login.dashboardManenger.eventos', compact('user'));
		}
		return redirect()->back();
	}
     public function eventosPublicados(){
		$idUser = Auth::id();
		$user = User::find($idUser);
        $eventos = Evento::orderBy('id','desc')->paginate(5);
		$verificacao = $user->permissions->adm;

		if($verificacao=="sim")
		{
			return view('login.dashboardManenger.eventosPublicados', compact('user', 'eventos'));
		}
		return redirect()->back();
	}
    public function promocoes(){
		$idUser = Auth::id();
        $promotions = Promotion::orderBy('id', 'desc')->paginate(5);
		$user = User::find($idUser);
		$verificacao = $user->permissions->adm;

		if($verificacao=="sim")
		{
			return view('login.dashboardManenger.promocao', compact('user', 'promotions'));
		}
		return redirect()->back();
	}
}
