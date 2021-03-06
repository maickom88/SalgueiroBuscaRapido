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
use App\Empresa\Feed\NovidadeEmpresa;
use App\Empresa\Promotion\Promotion;
use App\Evento\Evento;
use App\Post\Post;
use PhpParser\JsonDecoder;
use Spatie\Analytics\AnalyticsFacade;
use Spatie\Analytics\Period;
use Illuminate\Support\Carbon;
use Analytics;
use App\BuscasOnSite\Search;
use App\Comment\Comment;
use App\Empresa\Album\Album;
use App\Like;
use Vinkla\Instagram\Instagram;
class PainelEmpresarialController extends Controller
{

	public function __construct()
	{
		$this->middleware('auth');
	}

	public function index(){
    $arrayDates = [];
    $startJaneiro =  Carbon::create(2020,1, 01);
    $endJaneiro  =  Carbon::create(2020, 1, 31);
    $pJaneiro = Period::create ($startJaneiro , $endJaneiro);
    $janeiro = Analytics::fetchVisitorsAndPageViews($pJaneiro);
    array_push($arrayDates, $janeiro);

    $startFevereiro =  Carbon::create(2020,2, 01);
    $endFevereiro  =  Carbon::create(2020, 2, 31);
    $pFevereiro = Period::create ($startFevereiro , $endFevereiro);
    $fevereiro = Analytics::fetchVisitorsAndPageViews($pFevereiro);
    array_push($arrayDates, $fevereiro);

    $startMarco =  Carbon::create(2020,3, 01);
    $endMarco  =  Carbon::create(2020, 3, 31);
    $pMarco = Period::create ($startMarco , $endMarco);
    $marco = Analytics::fetchVisitorsAndPageViews($pMarco);
    array_push($arrayDates, $marco);

    $startAbril =  Carbon::create(2020,4, 01);
    $endAbril  =  Carbon::create(2020, 4, 31);
    $pAbril = Period::create ($startAbril , $endAbril);
    $abril = Analytics::fetchVisitorsAndPageViews($pAbril);
    array_push($arrayDates, $abril);

    $startMaio =  Carbon::create(2020,5, 01);
    $endMaio  =  Carbon::create(2020, 5, 31);
    $pMaio = Period::create ($startMaio , $endMaio);
    $maio = Analytics::fetchVisitorsAndPageViews($pMaio);
    array_push($arrayDates, $maio);

    $startJunho =  Carbon::create(2020,6, 01);
    $endJunho  =  Carbon::create(2020, 6, 31);
    $pJunho = Period::create ($startJunho , $endJunho);
    $junho = Analytics::fetchVisitorsAndPageViews($pJunho);
    array_push($arrayDates, $junho);

    $startJulho =  Carbon::create(2020,7, 01);
    $endJulho  =  Carbon::create(2020, 7, 31);
    $pJulho = Period::create ($startJulho , $endJulho);
    $julho = Analytics::fetchVisitorsAndPageViews($pJulho);
    array_push($arrayDates, $julho);

    $startAgosto =  Carbon::create(2020,8, 01);
    $endAgosto  =  Carbon::create(2020, 8, 31);
    $pAgosto = Period::create ($startAgosto , $endAgosto);
    $agosto = Analytics::fetchVisitorsAndPageViews($pAgosto);
    array_push($arrayDates, $agosto);

    $startSetembro =  Carbon::create(2020,9, 01);
    $endSetembro  =  Carbon::create(2020, 9, 31);
    $pSetembro = Period::create ($startSetembro , $endSetembro);
    $setembro = Analytics::fetchVisitorsAndPageViews($pSetembro);
    array_push($arrayDates, $setembro);

    $startOutubro =  Carbon::create(2020,10, 01);
    $endOutubro  =  Carbon::create(2020, 10, 31);
    $pOutubro = Period::create ($startOutubro , $endOutubro);
    $outubro = Analytics::fetchVisitorsAndPageViews($pOutubro);
    array_push($arrayDates, $outubro);

    $startNovembro =  Carbon::create(2020,11, 01);
    $endNovembro  =  Carbon::create(2020, 11, 31);
    $pNovembro = Period::create ($startNovembro , $endNovembro);
    $novembro = Analytics::fetchVisitorsAndPageViews($pNovembro);
    array_push($arrayDates, $novembro);

    $startDezembro =  Carbon::create(2020,12, 01);
    $endDezembro  =  Carbon::create(2020, 12, 31);
    $pDezembro = Period::create ($startDezembro , $endDezembro);
    $dezembro = Analytics::fetchVisitorsAndPageViews($pDezembro);
    array_push($arrayDates, $dezembro);
    $arrayAnalytics= ['Janeiro'=> 0 , 'Fevereiro'=> 0, 'Março'=> 0, 'Abril'=> 0, 'Maio'=> 0,
                        'Junho'=> 0, 'Julho'=> 0, 'Agosto'=> 0, 'Setembro'=> 0, 'Outubro'=> 0, 'Novembro'=> 0, 'Dezembro'=> 0];
    $quantMes = 0;
    $user = Auth::User();
    for ($i=0; $i < 12 ; $i++) {
        $count = count($arrayDates[$i]);
        $mes = array_keys($arrayAnalytics)[$quantMes];
        if(!empty($count)){
        for ($j=0; $j < $count ; $j++) {
            $title = $arrayDates[$i][$j]['pageTitle'];
            $title = explode(':',$title);
            $idEmp = explode('_',$title[1]);
            $idCont = count($idEmp);
            if($idCont > 1){
                if(is_numeric($idEmp[1])){
                    if($user->empresas->id == $idEmp[1] & $user->empresas->name == $idEmp[0]){
                        $views = $arrayDates[$i][$j]['pageViews'];
                        $arrayAnalytics[$mes] = $views;
                    }
                }
            }
        }
    }
    $quantMes++;
}

while(count($arrayAnalytics) < 12){
    array_push($arrayAnalytics, 0);
}
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
    $cid = '457982';
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
    $promotion = $user->permissions->empresas->promotion;
    $post = Post::orderBy('views','desc')->first();
    $evento = Evento::orderBy('id','desc')->first();
    $charts = new SampleChart;
    $charts->labels(['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho','Julho','Agosto', 'Setembro','Outubro','Novembro','Dezembro']);
    $charts->dataset('Visitas Mensais', 'bar', [$arrayAnalytics['Janeiro'],$arrayAnalytics['Fevereiro'],
    $arrayAnalytics['Março'],
    $arrayAnalytics['Abril'],
    $arrayAnalytics['Maio'],
    $arrayAnalytics['Junho'],
    $arrayAnalytics['Julho'],
    $arrayAnalytics['Agosto'],
    $arrayAnalytics['Setembro'],
    $arrayAnalytics['Outubro'],
    $arrayAnalytics['Novembro'],
    $arrayAnalytics['Dezembro']
    ])->options([
    'color' => '#fff',
        'backgroundColor' => '#00A3EE',
        'lineTension' => 'left',
        'fill' => 'true',
    ]);
    $idUser = Auth::user()->id;
    $user = User::find($idUser);
    $filtro = $user->empresas->nincho;
    $buscas = Search::where('busca','LIKE', '%'.$filtro.'%')->count();
    $idEmpresa = $user->empresas->id;

    $likesUser = Like::where('empresa_id',$idEmpresa)->orderBy('id','desc')->limit(3)->get();
    $commentsUser = Comment::where('empresa_id', $idEmpresa)->orderBy('id','desc')->limit(3)->get();
    $userModel = new User();
    try{
        $dados = json_decode(file_get_contents('http://api.hgbrasil.com/weather?woeid='.$cid.'&format=json&key='.$chave), true);

        return view('login.dashboard.dashboardEmp',compact('userModel','commentsUser','likesUser','user' ,'dados', 'charts','promotion','evento', 'post','buscas','insta'));

    }
    catch(Exception $e){
    $dados = ([
        "results"=>[
            "temp"=>25
        ]
    ]);
    return view('login.dashboard.dashboardEmp',compact('userModel','commentsUser','likesUser','user' ,'buscas','dados', 'charts', 'promotion','evento','insta'));
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
        $post = Post::orderBy('id','desc')->first();
		$verificacao = $user->permissions->empresario;

		if($verificacao=="sim"){
		return view('login.dashboard.paginas.noticiasEmp', compact('user', 'post'));
		}
		return redirect()->back();
	}
	public function eventos(){

		$idUser = Auth::id();
		$user = User::find($idUser);
        $eventos = Evento::orderBy('id', 'desc')->take(3)->get();
		$verificacao = $user->permissions->empresario;

		if($verificacao=="sim"){
		return view('login.dashboard.paginas.eventEmp', compact('user', 'eventos'));
		}
		return redirect()->back();
	}
	public function postagens(){
		$idUser = Auth::id();
		$user = User::find($idUser);

		$verificacao = $user->permissions->empresario;

		if($verificacao=="sim"){
            $novidades = NovidadeEmpresa::where('empresa_id', $user->empresas->id)->get();
            if($novidades->isNotEmpty()){
                $novidades = NovidadeEmpresa::where('empresa_id', $user->empresas->id)->orderBy('id','desc')->paginate(5);
            }
            return view('login.dashboard.paginas.feed.postagens', compact('user', 'novidades'));
		}
		return redirect()->back();
	}

	public function logout(){
		Auth::logout();
		return redirect()->route('home');
		}

    public function addPhoto(Request $req){
        $idUser = Auth::user()->id;
        $user = User::find($idUser);
        if($req->hasFile('album')){
			$len = count($req->album);
			$id = $user->id;
			$email = $user->email;
			for($i= 0; $i<$len ; $i++){
				$name = uniqid(date('HisYmd'));
				$extension = $req->album[$i]->extension();
				$nameFile = "{$name}.{$extension}";
				$upload = $req->album[$i]->storeAs('storage/album-empresa/'.$email, $nameFile, 'pictures');
				$valid = $this->savePhotos($id, $nameFile);
			}
		}
        return redirect()->route('editarEmp');
    }
    public function savePhotos($id, $nameFile){
		$user = User::find($id);
		$album = new Album();
		$album->photo = $nameFile;
		$user->empresas->album()->save($album);
		return 'ok';
	}
}
