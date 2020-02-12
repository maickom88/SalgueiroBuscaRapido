<?php

namespace App\Http\Controllers\ControllersApi;

use App\Empresa\Album\PhotosFeed;
use App\Empresa\AlbumNovidade;
use Illuminate\Support\Facades\Auth;
use App\Empresa\Empresa;
use App\Empresa\Feed\NovidadeEmpresa;
use App\Empresa\Novidade;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class FeedController extends Controller
{
	public function postar(Request $req)
	{
		$empresa = Empresa::find($req->input('empresa'));
		$dados = $req->input('editor1');
		$novidade = new NovidadeEmpresa();
		$novidade->content = $dados;
		$valid = $empresa->novidades()->save($novidade);
        $empresa = Empresa::find($req->input('empresa'));
        $novidadesId = $empresa->novidades->id;

		if($req->hasFile('photos')){
			$len = count($req->photos);
			$id = $empresa->id;
			$email = $empresa->permissions->users->email;
			for($i= 0; $i<$len ; $i++){
				$name = uniqid(date('HisYmd'));
				$extension = $req->photos[$i]->extension();
				$nameFile = "{$name}.{$extension}";
				$upload = $req->photos[$i]->storeAs('storage/album-novidades/'.$email, $nameFile, 'pictures');
				$valid = $this->savePhotos($id, $nameFile);
			}
			return response()->json('Publicado com foto');
		}
		return response()->json('Publicado');
	}
	public function savePhotos($id, $nameFile){
		$novidade = NovidadeEmpresa::find($id)->orderBy('id', 'desc')->first()->get();
		$album = new PhotosFeed();
		$album->album = $nameFile;
		$album->novidade_empresa_id = $novidade->id;
        $album->save();

		return 'ok';
	}

	public function show($id){
	$empresa = Empresa::find($id);
	$novidades = NovidadeEmpresa::where('empresa_id', $id)->orderBy('id','desc')->paginate(1);
	return view('paginaIndividual.pageNovidades', compact('novidades', 'empresa'));
	}

}
