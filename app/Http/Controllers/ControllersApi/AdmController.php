<?php

namespace App\Http\Controllers\ControllersApi;

use App\Empresa\facilities\Facilite;
use App\User;
use App\Permission\Permission;
use App\Empresa\Empresa;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Empresa\Open\Open;
use App\Empresa\Album\Album;
use App\Contact\Contact;
use App\Parceiro;
class AdmController extends Controller
{
  public function adicionarEmpresa(Request $req)
	{
		$open = new Open();
		$facilite = new Facilite();
		$empresa = new Empresa();
		$name = $req->input('name');
      $email = $req->input('emailEmp');
      $pass = $req->input('password');
		$album = new Album();
		$validation = $this->adicionaUser($name, $email, $pass);

		if($validation == 'emailExiste'){
			return response()->json("emailExist");
		}
		
		if($validation != 'true'){
			return response()->json('ErroLogin');
		}

		$user = User::where('email', $email)->get();

		if(!empty($req->input('nameEmp'))){
			$empresa->name = $req->input('nameEmp');
		}
		if(!empty($req->input('descriptionEmp'))){
			$empresa->description = $req->input('descriptionEmp');
		}
		if(!empty($req->input('tags'))){
			$empresa->tags = $req->input('tags');
		}
		if(!empty($req->input('nincho'))){
			$empresa->nincho = $req->input('nincho');
		}
		if(!empty($req->input('location'))){
			$empresa->location = $req->input('location');
		}
		if(!empty($req->input('tel'))){
			$empresa->tel = $req->input('tel');
		}
		if(!empty($req->input('emailContato'))){
			$empresa->email = $req->input('emailContato');
		}
		if(!empty($req->input('whatsapp'))){
			$empresa->whatsapp = $req->input('whatsapp');
		}
		if(!empty($req->input('facebook'))){
			$empresa->facebook = $req->input('facebook');
		}
		if(!empty($req->input('instagram'))){
			$empresa->instagram =$req->input('instagram');
		}
		if(!empty($req->input('status'))){
			$empresa->status = $req->input('status');
		}

		$facilite->climatizado = $req->input('climatizado');
		$facilite->wifi = $req->input('wifi');
		$facilite->estacionamento = $req->input('estacionamento');
		$facilite->cartao = $req->input('cartao');
		$facilite->delivery = $req->input('delivery');
		$facilite->orcamento = $req->input('orcamento');

		if(!empty($req->input('inicioSegunda'))){
			$inicio = $req->input('inicioSegunda');
			$fim = $req->input('fimSegunda');
			$jsonSegunda = '{"Inicio":"'.$inicio.'","Fim":"'.$fim.'"}';
			$open->segunda = $jsonSegunda;
		}
		else{
			$open->segunda = 'Fechado';
		}
		if(!empty($req->input('inicioTerca'))){
			$inicio = $req->input('inicioTerca');
			$fim = $req->input('fimTerca');
			$jsonTerca = '{"Inicio":"'.$inicio.'","Fim":"'.$fim.'"}';
			$open->terca = $jsonTerca;
		}
		else{
			$open->terca = 'Fechado';
		}
		if(!empty($req->input('inicioQuarta'))){
			$inicio = $req->input('inicioQuarta');
			$fim = $req->input('fimQuarta');
			$jsonQuarta = '{"Inicio":"'.$inicio.'","Fim":"'.$fim.'"}';
			$open->quarta = $jsonQuarta;
		}
		else{
			$open->quarta = 'Fechado';
		}
		if(!empty($req->input('inicioQuinta'))){
			$inicio = $req->input('inicioQuinta');
			$fim = $req->input('fimQuinta');
			$jsonQuinta = '{"Inicio":"'.$inicio.'","Fim":"'.$fim.'"}';
			$open->quinta = $jsonQuinta;
		}
		else{
			$open->quinta = 'Fechado';
		}
		if(!empty($req->input('inicioSexta'))){
			$inicio = $req->input('inicioSexta');
			$fim = $req->input('fimSexta');
			$jsonSexta = '{"Inicio":"'.$inicio.'","Fim":"'.$fim.'"}';
			$open->sexta = $jsonSexta;
		}
		else{
			$open->sexta = 'Fechado';
		}
		if(!empty($req->input('inicioSabado'))){
			$inicio = $req->input('inicioSabado');
			$fim = $req->input('fimSabado');
			$jsonSabado = '{"Inicio":"'.$inicio.'","Fim":"'.$fim.'"}';
			$open->sabado = $jsonSabado;
		}
		else{
			$open->sabado = 'Fechado';
		}
		if(!empty($req->input('inicioDomingo'))){
			$inicio = $req->input('inicioDomingo');
			$fim = $req->input('fimDomingo');
			$jsonDomingo = '{"Inicio":"'.$inicio.'","Fim":"'.$fim.'"}';
			$open->domingo = $jsonDomingo;
		}else{
			$open->domingo = 'Fechado';
		}
	
				
		if($req->hasFile('imagem') && $req->file('imagem')->isValid()){
				
			$name = uniqid(date('HisYmd'));
			$extension = $req->imagem->extension();
			$nameFile = "{$name}.{$extension}";
			$upload = $req->imagem->storeAs('logo-empresas', $nameFile);
			if ( !$upload ){
				return response()->json("ErrorSavedImg");
			}
			$empresa->logoMarca = $nameFile;
			$valid = $user[0]->permissions->empresas()->save($empresa);
			$validFacilite = $user[0]->permissions->empresas->facilities()->save($facilite);
			$validOpen = $user[0]->permissions->empresas->open()->save($open);
			
		}
		if($req->hasFile('banner') && $req->file('banner')->isValid()){
				
			$name = uniqid(date('HisYmd'));
			$extension = $req->banner->extension();
			$nameFile = "{$name}.{$extension}";
			$upload = $req->banner->storeAs('logo-empresas', $nameFile);
			if ( !$upload ){
				return response()->json("ErrorSavedImg");
			}
			$empresa->banner = $nameFile;
			$valid = $user[0]->permissions->empresas()->save($empresa);
			$validFacilite = $user[0]->permissions->empresas->facilities()->save($facilite);
			$validOpen = $user[0]->permissions->empresas->open()->save($open);
			
		}

		$valid = $valid = $user[0]->permissions->empresas()->save($empresa);
		$validFacilite = $user[0]->permissions->empresas->facilities()->save($facilite);
		$validOpen = $user[0]->permissions->empresas->open()->save($open);
		
		if($req->hasFile('album')){
			$len = count($req->album);
			$id = $user[0]->id;
			$email = $user[0]->email;
			for($i= 0; $i<$len ; $i++){
				$name = uniqid(date('HisYmd'));
				$extension = $req->album[$i]->extension();
				$nameFile = "{$name}.{$extension}";
				$upload = $req->album[$i]->storeAs('album-empresa/'.$email, $nameFile);
				$valid = $this->savePhotos($id, $nameFile);
			}				
			
		}

		if($valid){
			return response()->json("Cadastrado!");
		}
			return response()->json('Error');
	}

	public function adicionaUser($name, $email, $pass){	
		$user = new User();
      $per = new Permission();
		$ifExist = $user->where('email',$email)->count();

		if($ifExist == 1){
			return "emailExiste";
		}

		$user->name= $name;
		$user->email= $email;
		$user->password= bcrypt($pass);
		$validation = $user->save();

		$per->empresario = 'sim';
		$user->permissions()->save($per);

		if($validation)
			{
				return 'true';
			}
			else{
				return 'false';
			}	
	}

	
	public function listarEmpresas(Request $request){
	
	$empresas = Empresa::orderBy('id','desc')->paginate(5);

	if ($request->ajax()) {
		return view('login.dashboardManenger.empresasAll', compact('empresas'));
	}

	return view('login.dashboardManenger.empresas',compact('empresas'));
	}
	
	public function listarTodasEmpresas(Request $request){
	
	$todas = "MostrarTodas";
	$empresas = Empresa::all();

	if ($request->ajax()) {
		return view('login.dashboardManenger.empresasAll', compact('empresas', 'todas'));
	}

	return view('login.dashboardManenger.empresas',compact('empresas', 'todas'));
	}

	
	public function excluirEmpresas(Request $id){
		
		$idEmp = $id->keys()[0];
		$empresa = Empresa::find($idEmp);
		$valid = $empresa->delete();
		return response()->json($valid);;
	}

	public function listarEmpresasDesativadas(Request $request){
		$desativadas = "dasativada";
		$empresas = Empresa::where('status', 'desativada')->orderBy('id', 'desc')->get();

		if ($request->ajax()) {
			return view('login.dashboardManenger.empresasAll', compact('empresas', 'desativadas'));
		}
	}
	
	public function listarEmpresasAtivas(Request $request){
		$desativadas = "dasativada";
		$empresas = Empresa::where('status', 'ativa')->orderBy('id', 'desc')->get();

		if ($request->ajax()) {
			return view('login.dashboardManenger.empresasAll', compact('empresas', 'desativadas'));
		}
	}
	public function buscarEmp($id){
		$empresa = Empresa::where('id',$id)->with('facilities', 'open')->get();
		
		
		return response()->json($empresa);
	}

	public function editarEmpresa(Request $req){
		$id = $req->input('idEmpresa');

		$empresa = Empresa::find($id);

		if(!empty($req->input('nameEmp'))){
			$empresa->name = $req->input('nameEmp');
		}
		if(!empty($req->input('descriptionEmp'))){
			$empresa->description = $req->input('descriptionEmp');
		}
		if(!empty($req->input('tags'))){
			$empresa->tags = $req->input('tags');
		}
		if(!empty($req->input('nincho'))){
			$empresa->nincho = $req->input('nincho');
		}
		if(!empty($req->input('location'))){
			$empresa->location = $req->input('location');
		}
		if(!empty($req->input('tel'))){
			$empresa->tel = $req->input('tel');
		}
		if(!empty($req->input('emailContato'))){
			$empresa->email = $req->input('emailContato');
		}
		if(!empty($req->input('whatsapp'))){
			$empresa->whatsapp = $req->input('whatsapp');
		}
		if(!empty($req->input('facebook'))){
			$empresa->facebook = $req->input('facebook');
		}
		if(!empty($req->input('instagram'))){
			$empresa->instagram =$req->input('instagram');
		}
		if(!empty($req->input('status'))){
			$empresa->status = $req->input('status');
		}

		$empresa->facilities->wifi = $req->input('wifi');
		$empresa->facilities->estacionamento = $req->input('estacionamento');
		$empresa->facilities->cartao = $req->input('cartao');
		$empresa->facilities->delivery = $req->input('delivery');
		$empresa->facilities->orcamento = $req->input('orcamento');
		$empresa->facilities->climatizado = $req->input('climatizado');

		if(!empty($req->input('inicioSegunda'))){
			$inicio = $req->input('inicioSegunda');
			$fim = $req->input('fimSegunda');
			$jsonSegunda = '{"Inicio":"'.$inicio.'","Fim":"'.$fim.'"}';
			$empresa->open->segunda = $jsonSegunda;
		}
		if(!empty($req->input('inicioTerca'))){
			$inicio = $req->input('inicioTerca');
			$fim = $req->input('fimTerca');
			$jsonTerca = '{"Inicio":"'.$inicio.'","Fim":"'.$fim.'"}';
			$empresa->open->terca = $jsonTerca;
		}
		if(!empty($req->input('inicioQuarta'))){
			$inicio = $req->input('inicioQuarta');
			$fim = $req->input('fimQuarta');
			$jsonQuarta = '{"Inicio":"'.$inicio.'","Fim":"'.$fim.'"}';
			$empresa->open->quarta = $jsonQuarta;
		}
		if(!empty($req->input('inicioQuinta'))){
			$inicio = $req->input('inicioQuinta');
			$fim = $req->input('fimQuinta');
			$jsonQuinta = '{"Inicio":"'.$inicio.'","Fim":"'.$fim.'"}';
			$empresa->open->quinta = $jsonQuinta;
		}
		if(!empty($req->input('inicioSexta'))){
			$inicio = $req->input('inicioSexta');
			$fim = $req->input('fimSexta');
			$jsonSexta = '{"Inicio":"'.$inicio.'","Fim":"'.$fim.'"}';
			$empresa->open->sexta = $jsonSexta;
		}
		if(!empty($req->input('inicioSabado'))){
			$inicio = $req->input('inicioSabado');
			$fim = $req->input('fimSabado');
			$jsonSabado = '{"Inicio":"'.$inicio.'","Fim":"'.$fim.'"}';
			$empresa->open->sabado = $jsonSabado;
		}
		if(!empty($req->input('inicioDomingo'))){
			$inicio = $req->input('inicioDomingo');
			$fim = $req->input('fimDomingo');
			$jsonDomingo = '{"Inicio":"'.$inicio.'","Fim":"'.$fim.'"}';
			$empresa->open->domingo = $jsonDomingo;
		}
		$empresa->save();
		$empresa->facilities->save();
		$empresa->open->save();
	}
	public function savePhotos($id, $nameFile){
		$user = User::find($id);
		$album = new Album();
		$album->photo = $nameFile;
		$user->empresas->album()->save($album);
		return 'ok';
	}
	public function mensagens(Request $request){
	$contact = Contact::orderBy('id','desc')->paginate(5);
	$parceiro = Parceiro::orderBy('id','desc')->paginate(5);;
		if ($request->ajax()) {
			return view('login.dashboardManenger.contatoTabela', compact('contact', 'parceiro'));
		}
	return view('login.dashboardManenger.contato',compact('contact','parceiro'));
	}

	public function excluirMensagens(Request $id){
		$idContato = $id->keys()[0];
		$contato = Contact::find($idContato);
		$valid = $contato->delete();
		return response()->json($valid);;
	}
}
