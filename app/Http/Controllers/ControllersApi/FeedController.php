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
		
		if($req->hasFile('photos')){
			$len = count($req->photos);
			$id = $empresa->id; 
			$email = $empresa->permissions->users->email;
			for($i= 0; $i<$len ; $i++){
				$name = uniqid(date('HisYmd'));
				$extension = $req->photos[$i]->extension();
				$nameFile = "{$name}.{$extension}";
				$upload = $req->photos[$i]->storeAs('album-novidades/'.$email, $nameFile);
				$valid = $this->savePhotos($id, $nameFile);
			}				
			return response()->json('Publicado com foto');
		}
		return response()->json('Publicado');
	}
	public function savePhotos($id, $nameFile){
		$empresa = Empresa::find($id);
		$album = new PhotosFeed();
		$album->album = $nameFile;
		$empresa->novidades->last()->photos()->save($album);

		return 'ok';
	}
}
