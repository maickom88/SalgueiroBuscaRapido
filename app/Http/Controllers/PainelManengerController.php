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
use App\Post\Post;

class PainelManengerController extends Controller
{
	public function __construct()
   {
      $this->middleware('auth');
   }

	public function perfilUser(){
		$idUser = Auth::id();
        $promotionNotif = Promotion::all()->count();
		$user = User::find($idUser);
		$verificacao = $user->permissions->adm;
        $contactNotif = Contact::all()->count();
        $userNotif = User::all()->count();
		if($verificacao=="sim")
		{
			return view('login.dashboardManenger.perfilAdministrador', compact('user','contactNotif','promotionNotif','userNotif'));
		}
		return redirect()->back();
	}



	public function empresas(){
		$idUser = Auth::id();
        $promotionNotif = Promotion::all()->count();
		$user = User::find($idUser);
        $userNotif = User::all()->count();
		$empresas = Empresa::paginate(5);
        $contactNotif = Contact::all()->count();
		$verificacao = $user->permissions->adm;

		if($verificacao=="sim")
		{
			return view('login.dashboardManenger.empresas', compact('user', 'empresas','contactNotif','promotionNotif','userNotif'));
		}
		return redirect()->back();
	}
	public function usuarios(){
        $promotionNotif = Promotion::all()->count();
		$idUser = Auth::id();
        $userNotif = User::all()->count();
		$user = User::find($idUser);
        $contactNotif = Contact::all()->count();
		$verificacao = $user->permissions->adm;

		if($verificacao=="sim")
		{
			$users = User::orderBy('id', 'desc')->paginate(5);
			return view('login.dashboardManenger.usuarios', compact('user', 'users','contactNotif','promotionNotif','userNotif'));
		}
		return redirect()->back();
	}

	public function contato(){
		$idUser = Auth::id();
         $userNotif = User::all()->count();
        $promotionNotif = Promotion::all()->count();
		$user = User::find($idUser);

		$verificacao = $user->permissions->adm;
		$contact = Contact::orderBy('id')->paginate(5);
		$parceiro = Parceiro::all()->where('pedidos', 'Desejo ser Parceiro do site!');
        $contactNotif = Contact::all()->count();
		if($verificacao=="sim")
		{
			return view('login.dashboardManenger.contato', compact('user', 'contact', 'parceiro','contactNotif','promotionNotif','userNotif'));
		}
		return redirect()->back();
	}

	public function parceria(){
		$idUser = Auth::id();
         $userNotif = User::all()->count();
        $promotionNotif = Promotion::all()->count();
		$user = User::find($idUser);
        $contactNotif = Contact::all()->count();
		$verificacao = $user->permissions->adm;

		if($verificacao=="sim")
		{
			$userPer = Permission::where('blogueiro','sim')->get();
			return view('login.dashboardManenger.parceria', compact('userPer','user','contactNotif','promotionNotif','userNotif'));
		}
		return redirect()->back();
	}

	public function pagamento(){
		$idUser = Auth::id();
        $userNotif = User::all()->count();
        $promotionNotif = Promotion::all()->count();
		$user = User::find($idUser);
        $contactNotif = Contact::all()->count();
		$verificacao = $user->permissions->adm;

		if($verificacao=="sim")
		{
        date_default_timezone_set("Brazil/East");
        $contratosAll = Contrato::all();
        $promotionNotif = Promotion::all()->count();
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
			return view('login.dashboardManenger.pagamento', compact('user', 'contratos','contactNotif','promotionNotif','userNotif'));
		}
		return redirect()->back();
	}
    public function evento(){
		$idUser = Auth::id();
        $userNotif = User::all()->count();
		$user = User::find($idUser);
		$verificacao = $user->permissions->adm;
        $promotionNotif = Promotion::all()->count();
        $contactNotif = Contact::all()->count();
		if($verificacao=="sim")
		{
			return view('login.dashboardManenger.eventos', compact('user','contactNotif','promotionNotif','userNotif'));
		}
		return redirect()->back();
	}
     public function eventosPublicados(){
		$idUser = Auth::id();
		$user = User::find($idUser);
         $userNotif = User::all()->count();
        $eventos = Evento::orderBy('id','desc')->paginate(5);
		$verificacao = $user->permissions->adm;
        $contactNotif = Contact::all()->count();
        $promotionNotif = Promotion::all()->count();
		if($verificacao=="sim")
		{
			return view('login.dashboardManenger.eventosPublicados', compact('user', 'eventos','contactNotif','promotionNotif','userNotif'));
		}
		return redirect()->back();
	}
    public function promocoes(){
		$idUser = Auth::id();
        $userNotif = User::all()->count();
        $promotions = Promotion::orderBy('id', 'desc')->paginate(5);
		$user = User::find($idUser);
		$verificacao = $user->permissions->adm;
        $contactNotif = Contact::all()->count();
        $promotionNotif = Promotion::all()->count();
		if($verificacao=="sim")
		{
            $allPromotion = Promotion::all();
            foreach($allPromotion as $promotion){
                date_default_timezone_set("Brazil/East");
                $dataAtual = date("Y-m-d");
                $dataExpirada = $promotion->data_fim_promocao;
                $ifExpirade = strtotime($dataAtual) > strtotime($dataExpirada) ? true : false;
                if($ifExpirade){
                    $promotion->delete();
                }
            }
			return view('login.dashboardManenger.promocao', compact('user', 'promotions','contactNotif','promotionNotif','userNotif'));
		}
		return redirect()->back();
	}
     public function publicarNoticia(){
		$idUser = Auth::id();
         $userNotif = User::all()->count();
		$user = User::find($idUser);
		$verificacao = $user->permissions->adm;
        $contactNotif = Contact::all()->count();
        $promotionNotif = Promotion::all()->count();
		if($verificacao=="sim")
		{
			return view('login.dashboardManenger.noticia', compact('user','contactNotif','promotionNotif','userNotif'));
		}
		return redirect()->back();
	}
    public function noticias(){
		$idUser = Auth::id();
        $userNotif = User::all()->count();
		$user = User::find($idUser);
        $promotionNotif = Promotion::all()->count();
        $posts = Post::orderBy('id', 'desc')->paginate(5);
		$verificacao = $user->permissions->adm;
        $contactNotif = Contact::all()->count();
		if($verificacao=="sim")
		{
			return view('login.dashboardManenger.noticiaTable', compact('user', 'posts','contactNotif','promotionNotif','userNotif'));
		}
		return redirect()->back();
	}
}
