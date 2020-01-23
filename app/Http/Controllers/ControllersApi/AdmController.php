<?php

namespace App\Http\Controllers\ControllersApi;
use App\pageView\View;
use App\Empresa\facilities\Facilite;
use App\User;
use App\Permission\Permission;
use App\Empresa\Empresa;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Empresa\Open\Open;
use App\Empresa\Album\Album;
use App\Contact\Contact;
use App\Empresa\Contrato\Contrato;
use App\Parceiro;
use \Datetime;
use \DateInterval;
use App\Empresa\Promotion\Promotion;

class AdmController extends Controller
{
    public function __construct(){
        $this->insertedAt = new DateTime();
    }

    public function adicionarEmpresa(Request $req)
	{
        $contrato = new Contrato();
		$view = new View();
		$open = new Open();
		$facilite = new Facilite();
		$empresa = new Empresa();
		if($req->input('emailVincule')){
			$email = $req->input('emailVincule');
		}
		else{
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
		}

		$user = User::where('email', $email)->get();
		if($user->count() <= 0){
			return response()->json('emailNotExist');
		}
		$user[0]->permissions->empresario ='sim';
		$user[0]->permissions->user ='nao';
		$user[0]->permissions->adm = 'nao';
		$user[0]->permissions->blogueiro = 'nao';
		$user[0]->permissions->save();

        $contrato->tipo = $req->input('tipoContrato');
        $contrato->valor = $req->input('valorContrato');
        date_default_timezone_set("Brazil/East");
        $inicio = date("Y/m/d");
		$inicioDate = date("Y/m/d", strtotime($inicio));;
        $tipo =  $req->input('tipoContrato');
        if($tipo == 'mensal'){
            $data = $inicio;
            $data = DateTime::createFromFormat('Y/m/d', $data);
            $data->add(new DateInterval('P30D')); // 30 dias
            $fim = $data->format('Y/m/d');
            $fimDate = date("Y/m/d", strtotime($fim));
        }
		if($tipo == 'trimensal'){
            $data = $inicio;
            $data = DateTime::createFromFormat('Y/m/d', $data);
            $data->add(new DateInterval('P90D')); // 90 dias
            $fim = $data->format('Y/m/d');
            $fimDate = date("Y/m/d", strtotime($fim));
        }
		if($tipo == 'semestral'){
            $data = $inicio;
            $data = DateTime::createFromFormat('Y/m/d', $data);
            $data->add(new DateInterval('P180D')); //180 dias
				$fim = $data->format('Y/m/d');
				$fimDate = date("Y/m/d", strtotime($fim));
        }
        $contrato->inicio_contrato = $inicioDate;
        $contrato->fim_contrato = $fim;

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
			$view->views = 0;
			$empresa->logoMarca = $nameFile;
			$valid = $user[0]->permissions->empresas()->save($empresa);
			$validFacilite = $user[0]->permissions->empresas->facilities()->save($facilite);
			$validOpen = $user[0]->permissions->empresas->open()->save($open);
			$validViews = $user[0]->permissions->empresas->views()->save($view);
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
			$validViews = $user[0]->permissions->empresas->views()->save($view);

		}
        $view->views = 0;
		$valid = $valid = $user[0]->permissions->empresas()->save($empresa);
		$validFacilite = $user[0]->permissions->empresas->facilities()->save($facilite);
		$validOpen = $user[0]->permissions->empresas->open()->save($open);
		$validViews = $user[0]->permissions->empresas->views()->save($view);
		$validContrato =  $user[0]->permissions->empresas->contratos()->save($contrato);

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
        $empresa->permissions->user = 'sim';
        $empresa->permissions->empresario ='nao';
        $empresa->permissions->save();
        $empresa->contratos()->delete();
        $empresa->promotion()->delete();
        $empresa->views()->delete();
        $empresa->feeds()->delete();
        $empresa->likes()->delete();
        $empresa->novidades()->delete();
        $empresa->comments()->delete();
        $empresa->open()->delete();
        $empresa->facilities()->delete();
        $empresa->album()->delete();
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
	public function listarTodasMensagens(Request $request){

	$todas = "MostrarTodas";
	$contact = Contact::all();

	if ($request->ajax()) {
		return view('login.dashboardManenger.contatoTabela', compact('contact', 'todas'));
	}

	return view('login.dashboardManenger.empresas',compact('contact', 'todas'));
	}

	public function excluirMensagens(Request $id){
		$idContato = $id->keys()[0];
		$contato = Contact::find($idContato);
		$valid = $contato->delete();
		return response()->json($valid);;
	}
	public function parceriaAprovar(Request $id){

		$idParceria = $id->keys()[0];
		$parceria = Parceiro::find($idParceria);
		$parceria->pedidos = 'Ativo';
		$parceria->user->permissions->blogueiro = 'sim';
		$parceria->save();
		$valid = $parceria->user->permissions->save();
		return response()->json($valid);
	}

	public function updatePartner(Request $id){
		$idUser = $id->keys()[0];
		$user = User::find($idUser);
		$user->permissions->blogueiro = 'nao';
		$valid = $user->permissions->save();
		$user->parceiro->pedidos = 'Desejo ser Parceiro do site!';
		$user->parceiro->save();
		return response()->json($valid);
	}
	public function listarTodasParceriasAtivas(Request $request)
	{
		$todas = "MostrarTodas";
		$userPer = Permission::where('blogueiro','sim')->get();
		if ($request->ajax()) {
			return view('login.dashboardManenger.parceriaAtivas', compact('userPer', 'todas'));
		}
		return view('login.dashboardManenger.parceria',compact('userPer', 'todas'));
	}
	public function listarTodasParceriasPendentes(){
		$todas = "MostrarTodas";
		$parceiro = Parceiro::all()->where('pedidos', 'Desejo ser Parceiro do site!');

		return view('login.dashboardManenger.parceriaTabela', compact('parceiro', 'todas'));
	}
	public function parceriaNegar(Request $id){
		$idParceria = $id->keys()[0];
		$parceria = Parceiro::find($idParceria);
		$parceria->pedidos = 'negado';
		$valid = $parceria->save();
		return response()->json($valid);
	}

	public function listarUsuarios(Request $request){

	$todas = "MostrarTodas";
	$users = User::all();
		return view('login.dashboardManenger.usuariosAll', compact('users', 'todas'));
	}

	public function usuariosPaginate(Request $request){
		$users = User::orderBy('id', 'desc')->paginate(5);

		return view('login.dashboardManenger.usuariosAll', compact('users'));
	}
	public function updateUser(Request $request){
		$idUser = $request->input('idUser');
		$permission = $request->input('permissionUser');
		$user = User::find($idUser);
		if($permission == 'Administrador'){
			$user->permissions->adm = 'sim';
			$user->permissions->empresario = 'nao';
			$user->permissions->user = 'nao';
			$user->permissions->blogueiro = 'nao';
			$valid = $user->permissions->save();
		}
		else if($permission == 'Blogueiro'){
			$user->permissions->blogueiro = 'sim';
			$user->permissions->empresario = 'nao';
			$user->permissions->user = 'sim';
			$user->permissions->adm = 'nao';
			$valid = $user->permissions->save();
		}
		else if($permission == 'Empresarial'){
			$user->permissions->empresario = 'sim';
			$user->permissions->user = 'nao';
			$user->permissions->adm = 'nao';
			$user->permissions->blogueiro = 'nao';
			$valid = $user->permissions->save();
		}
		else if($permission == 'Usúario'){
			$user->permissions->user= 'sim';
			$user->permissions->empresario = 'nao';
			$user->permissions->blogueiro = 'nao';
            $user->permissions->adm = 'nao';
			$valid = $user->permissions->save();
		}

		return response()->json($valid);
	}
	public function deleteUser(Request $request){
		$idUser = $request->input('idUser');
		$permission = $request->input('idPermission');
		$user = User::find($idUser);
		if($permission == 'Empresarial'){
			if(!empty($user->empresas))
			{
				if(!empty($user->empresas->facilities)){
					$user->empresas->facilities->delete();
				}
				if(!empty($user->empresas->open)){
					$user->empresas->open->delete();
				}
				$user->empresas->contratos->delete();
				$user->empresas->delete();
			}
         $user->permissions->delete();
			$valid = $user->delete();
		}
		if($permission == 'Blogueiro'){
			$user->permissions->delete();
            $user->info->delete();
			$valid = $user->delete();
		}
		if($permission == 'Administrador'){
			$user->permissions->delete();
            $user->info->delete();
			$valid = $user->delete();
		}
		if($permission == 'Usúario'){
			$user->permissions->delete();
            $user->info->delete();
			$valid = $user->delete();
		}
		return response()->json($valid);
	}
    public function listarTodosContratos(Request $request){

	$todas = "MostrarTodas";
	$contratos = Contrato::all();
		return view('login.dashboardManenger.pagamentosTabela', compact('contratos', 'todas'));
	}

    public function listarContratos(Request $request){
		$contratos = Contrato::orderBy('id', 'desc')->paginate(5);

		return view('login.dashboardManenger.pagamentosTabela', compact('contratos'));
	}
    public function listarContratosExpirados(Request $request){
		$contratos = Contrato::where('status','expirado')->get();
        $desativadas = "dasativada";
		return view('login.dashboardManenger.pagamentosTabela', compact('contratos','desativadas'));
	}
    public function contratoUpdate(Request $req){
		$id = $req->input('idContrato');
        $tipo = $req->input('contrato');
        $valor = $req->input('valorContrato');

        $contrato = Contrato::find($id);


        $contrato->tipo = $req->input('contrato');
        $contrato->valor = $req->input('valorContrato');
        date_default_timezone_set("Brazil/East");
        $inicio = date("Y/m/d");
		$inicioDate = date("Y/m/d", strtotime($inicio));
        if($tipo == 'mensal'){
            $data = $inicio;
            $data = DateTime::createFromFormat('Y/m/d', $data);
            $data->add(new DateInterval('P30D')); // 30 dias
            $fim = $data->format('Y/m/d');
            $fimDate = date("Y/m/d", strtotime($fim));
        }
		   if($tipo == 'trimensal'){
            $data = $inicio;
            $data = DateTime::createFromFormat('Y/m/d', $data);
            $data->add(new DateInterval('P90D')); // 90 dias
            $fim = $data->format('Y/m/d');
            $fimDate = date("Y/m/d", strtotime($fim));
        }
		if($tipo == 'semestral'){
            $data = $inicio;
            $data = DateTime::createFromFormat('Y/m/d', $data);
            $data->add(new DateInterval('P180D')); //180 dias
				$fim = $data->format('Y/m/d');
				$fimDate = date("Y/m/d", strtotime($fim));
        }
        $contrato->inicio_contrato = $inicioDate;
        $contrato->fim_contrato = $fim;
        $contrato->status = 'ativa';
        $saved = $contrato->save();
        $contrato->empresas->status = 'ativa';
        $contrato->empresas->save();
        if($saved){
            return response()->json('true');
        }
    }
    public function mensagemUser(Request $dados){
        $id = $dados->input('idUser');
        $message = $dados->input('message');

        $user = User::find($id);
        $contact = new Contact;

        $contact->name = $user->name;
        $contact->email = $user->email;
        if(!empty($user->info)){
            if(!empty($user->info->telefone)){
                $contact->tel = $user->info->telefone;
            }
            else{
                $contact->tel = 'Sem numero!';
            }
        }
        else{
            $contact->tel = 'Sem numero!';
        }
        $contact->content = $message;
        $saved = $contact->save();
        return response()->json($saved);
    }

    public function promocoes(Request $request){
		$promotions = Promotion::orderBy('id', 'desc')->paginate(5);

		return view('login.dashboardManenger.promocoesTabela', compact('promotions'));
	}

    public function listarPromocoes(Request $request){
		$promotions = Promotion::all();
        $todas = "MostrarTodas";
		return view('login.dashboardManenger.promocoesTabela', compact('promotions', 'todas'));
	}
    public function excluirPromocao(Request $request){
        $id = $request->input('idPromotion');
		$promotion = Promotion::find($id);
        $valid = $promotion->delete();
        return response()->json($valid);
	}
}
