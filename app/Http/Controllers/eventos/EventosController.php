<?php

namespace App\Http\Controllers\eventos;

use App\Evento\Evento;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth;

class EventosController extends Controller
{
    public function publicar(Request $req){
        $Iduser = Auth::user()->id;
        $user = User::find($Iduser);
        $evento = new Evento();

        $evento->nome_evento = $req->input('nomeEvento');
        $evento->inicio_data_evento = $req->input('data1');
        $evento->fim_data_evento = $req->input('data2');
        $evento->inicio_hora_evento = $req->input('hora1');
        $evento->fim_hora_evento = $req->input('hora2');
        $ingresso = $req->input('ingresso');
        if(empty($ingresso)){
            $evento->ingresso = 'Gratuito';
        }
        else{
            $evento->ingresso = $req->input('ingresso');
        }
        $opEvento = $req->input('opEvento');
        if($opEvento == 'endereco'){
            $evento->endereco = $req->input('opEndereco');
        }
        else{
            $evento->endereco = 'Evento Online';
        }
        $evento->descricao_evento = $req->input('content');
        $evento->nome_org = $req->input('nomeOrg');
        $evento->descricao_org = $req->input('descOrg');
        $evento->categoria = $req->input('categoria');
        $evento->nomeclatura = $req->input('nomeclatura');

        if($req->hasFile('banner') && $req->file('banner')->isValid()){

			$name = uniqid(date('HisYmd'));
			$extension = $req->banner->extension();
			$nameFile = "{$name}.{$extension}";
			$upload = $req->banner->storeAs('storage/eventos', $nameFile, 'pictures');
			if ( !$upload ){
				return "error";
			}
			$evento->banner = $nameFile;
		}else{
            $evento->banner = 'vazio';
        }
        $valid = $user->eventos()->save($evento);
        if($valid){
            session()->put('status','publicado');
            return redirect()->back();
        }
        else{
            return 'Erro';
        }
    }
    public function eventoIndividual($nome, $id){
        $id = explode('_', $id);
        $id = end($id);
        $evento = Evento::find($id);
        if(Auth::check()){
            $idUser = Auth::user()->id;
            $user = User::find($idUser);
                return view('eventos\eventosIndividual', compact('evento','user'));
        }
        return view('eventos\eventosIndividual', compact('evento'));
    }
}
