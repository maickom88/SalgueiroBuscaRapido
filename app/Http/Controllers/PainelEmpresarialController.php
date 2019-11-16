<?php

namespace App\Http\Controllers;
use App\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Charts\GraficoMensal;
use App\Charts\SampleChart;
use Faker\Provider\Color;
use Illuminate\Mail\Message;
use App\Empresa\Empresa;
use PhpParser\JsonDecoder;

class PainelEmpresarialController extends Controller
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
			if($validEmp=='nao'){
					return  redirect()->back();
			}
		}
		$user = Auth::User();
		$chave='385bc83d';
		$cid = '457982'; // CID da sua cidade, encontre a sua em http://hgbrasil.com/weather

		$charts = new SampleChart;
		$charts->labels(['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho','Julho','Agosto', 'Setembro','Outubro','Novembro','Dezembro']);
		$charts->dataset('Visitas Mensais', 'bar', [1,2,3,4,5,44,7,8,9,10,76,12])->options([
    	'color' => '#fff',
		 'backgroundColor' => '#00A3EE',
		 'lineTension' => 'left',
		 'fill' => 'true',
		]);
		try{
			$dados = json_decode(file_get_contents('http://api.hgbrasil.com/weather?woeid='.$cid.'&format=json&key='.$chave), true);
			
			return view('login.dashboard.dashboardEmp',compact('user' ,'dados', 'charts'));
		
		}
		catch(Exception $e){
		$dados = ([
			"results"=>[
				"temp"=>25
			]
		]);
		return view('login.dashboard.dashboardEmp',compact('user' ,'dados', 'charts'));
		}
	}
	public function perfil(){
		
		$idUser = Auth::id();
		$user = User::find($idUser);
		
		$verificacao = $user->permissions->empresario;
	
		if($verificacao=="sim"){
			return view('login.dashboard.paginas.perfilEmp', compact('user'));
		}
		return redirect()->back();
	}
	public function editEmp(){
		
		$idUser = Auth::id();
		$user = User::find($idUser);
		
		$verificacao = $user->permissions->empresario;
	
		if($verificacao=="sim"){
			return view('login.dashboard.paginas.editarEmp', compact('user'));
		}
		return redirect()->back();
	}

	public function alterarEmp(Request $dados){

		$idUser = Auth::id();
		$user = new User();
		$idPermission = $user->find($idUser)->permissions->id;

		$empresa = new Empresa();

		$empresa->permission_id = $idPermission;

		$empresa->name = $dados->input('name');
		$empresa->description = $dados->input('description');
		$empresa->tags = $dados->input('tags');
		$empresa->nincho = $dados->input('tags');
		$empresa->location = $dados->input('location');
		$empresa->tel = $dados->input('tel');


		return response()->json([],200);
	}

	public function pagamento(){

		$idUser = Auth::id();
		$user = User::find($idUser);
		
		$verificacao = $user->permissions->empresario;
	
		if($verificacao=="sim"){
			return view('login.dashboard.paginas.pagamento', compact('user'));
		}
		return redirect()->back();
		
	}
	public function noticias(){
		$idUser = Auth::id();
		$user = User::find($idUser);

		$verificacao = $user->permissions->empresario;
	
		if($verificacao=="sim"){
		return view('login.dashboard.paginas.noticiasEmp', compact('user'));
		}
		return redirect()->back();
	}
	public function eventos(){

		$idUser = Auth::id();
		$user = User::find($idUser);
		
		$verificacao = $user->permissions->empresario;
	
		if($verificacao=="sim"){
		return view('login.dashboard.paginas.eventEmp', compact('user'));
		}
		return redirect()->back();
	}

	public function logout(){
		Auth::logout();
		return redirect()->route('home');
		}


		
}
