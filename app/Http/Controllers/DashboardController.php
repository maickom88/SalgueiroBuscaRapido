<?php

namespace App\Http\Controllers;
use App\User;
use App\Parceiro;
use Exception;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Vinkla\Instagram\Instagram;

class DashboardController extends Controller
{
   public function __construct()
   {
      $this->middleware('auth');
   }

   public function index(){

      if (Auth::check()) {
            $user = new User();
            $userID = Auth::user()->id;
            $validEmp = $user->find($userID)->permissions->empresario;
				$vlaidAdmin = $user->find($userID)->permissions->adm;
            if($validEmp=='sim'){
               return  redirect()->back();
            }
				else if($vlaidAdmin){
					return redirect()->route('empManenger');
				}
      }
		$idUser = Auth::id();
		$user = User::find($idUser);
		try{
			$instagram = new Instagram('2089363990.1677ed0.96d466364c2d4f4fbf55e7097920f69d');
			$insta = $instagram->media(['count'=>2	]);	
		}
		catch(Exception $e){
			$j = '{
					"link" : "https://www.instagram.com/p/BsLUGRJHPs2/",
					"user" : {
						"username": "srfrank__",
						"profile_picture":"https://scontent.cdninstagram.com/vp/a89b9961ba543c9e0ad50668df298fb9/5E2B1EB4/t51.2885-19/s150x150/41994235_273303863291015_8073893064499789824_n.jpg?_nc_ht=scontent.cdninstagram.com"
					},
					"images" : { 
						"low_resolution" :{
							"url": "https://scontent.cdninstagram.com/vp/1f21c4419622421ee407be1d90a58933/5E24DD9B/t51.2885-15/e35/p320x320/47689688_287224058651439_5941001623868708459_n.jpg?_nc_ht=scontent.cdninstagram.com"
						}
					}
				}';
				$m = json_decode($j);
			$json =[
				0 =>  $m,
				1 => $m
				];
			$insta = $json;
		};
		
		return view('login.dashboardUser.paginas.painel', compact(['user', 'insta']));
   }
	public function perfil(){

		
		$idUser = Auth::id();
		$user = User::find($idUser);
		
		$verificacao = $user->permissions->user;
	
		if($verificacao=="sim"){
			return view('login.dashboardUser.paginas.perfil', compact('user'));
		}
		return redirect()->back();
	}
	public function listaEmpresas(){
		$idUser = Auth::id();
		$user = User::find($idUser);
		$verificacao = $user->permissions->user;

		if($verificacao=="sim"){
		return view('login.dashboardUser.paginas.listaEmp', compact('user'));
		}
		return redirect()->back();
	
	}
	public function noticia(){
		$idUser = Auth::id();
		$user = User::find($idUser);

		$verificacao = $user->permissions->user;
	
		if($verificacao=="sim"){
		return view('login.dashboardUser.paginas.noticiasUser', compact('user'));
		}
		return redirect()->back();
	}
	public function eventos(){

		$idUser = Auth::id();
		$user = User::find($idUser);
		
		$verificacao = $user->permissions->user;
	
		if($verificacao=="sim"){
		return view('login.dashboardUser.paginas.eventos', compact('user'));
		}
		return redirect()->back();
	}
	public function parceiro(){
		$idUser = Auth::id();
		$parceiro = new Parceiro();
		$isParceiro = $parceiro->where('user_id',$idUser)->count();
		$user = User::find($idUser);

		$verificacao = $user->permissions->user;
	
		if($verificacao=="sim"){
		return view('login.dashboardUser.paginas.parceiroUser', compact(['isParceiro','user']));
		}
		return redirect()->back();
	}
	public function logout(){
		Auth::logout();
		return redirect()->route('home');
		
	}
}
