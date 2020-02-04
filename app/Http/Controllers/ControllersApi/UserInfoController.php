<?php

namespace App\Http\Controllers\ControllersApi;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Info;

class UserInfoController extends Controller
{
	public function show($id){
		$user = User::find($id);

		$info = $user->info;

		return response()->json($info);
	}

	public function update(Request $request){
		$idUser = $request->input('idUser');
		$user = User::find($idUser);

		if(empty($user->info)){
			$info = new Info();
			$info->user_id = $idUser;
			$info->idade = $request->input('idade');
			$info->interesse = $request->input('interesse');
			$info->endereco = $request->input('endereco');
			$info->telefone = $request->input('telefone');
			if($request->hasFile('imagem') && $request->file('imagem')->isValid()){
				$name = uniqid(date('HisYmd'));
				$extension = $request->imagem->extension();
				$nameFile = "{$name}.{$extension}";
				$info->avatar = $nameFile;
				$upload = $request->imagem->storeAs('storage/avatar', $nameFile, 'pictures');
				if ( !$upload ){
					return response()->json('error');
					}
			}
			$saved = $info->save();
			if($saved){
				return response()->json($saved);
			}

			return response()->json('error');
		}


		if(!empty($request->input('idade'))){
			$user->info->idade = $request->input('idade');
		}
		if(!empty($request->input('interesse'))){
			$user->info->interesse = $request->input('interesse');
		}
		if(!empty($request->input('endereco'))){
			$user->info->endereco = $request->input('endereco');
		}
		if(!empty($request->input('telefone'))){
			$user->info->telefone = $request->input('telefone');
		}

		if($request->hasFile('imagem') && $request->file('imagem')->isValid()){

			$name = uniqid(date('HisYmd'));
			$extension = $request->imagem->extension();
			$nameFile = "{$name}.{$extension}";
			$upload = $request->imagem->storeAs('storage/avatar', $nameFile, 'pictures');
			if ( !$upload ){
				return "error";
			}
			$user->info->avatar = $nameFile;
			$valid = $user->info->save();
			return response()->json($valid);
		}
		$valid = $user->info->save();
		return response()->json($valid);
	}

}
