<?php

namespace App\Http\Controllers\ControllersApi;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Empresa\Empresa;

class Empresas extends Controller
{

	


   public function edit($id){
			$user = User::find($id);
			if(isset($user)){		
				$userEmp = $user->empresas;
				if(isset($userEmp)){
					$usersJson = json_decode($userEmp);
					return response()->json($usersJson);
				}
			}

			
		}

	public function update(Request $request){
		$idUser = $request->input('idUser');	
		
		
		
		$user = User::find($idUser);
		if(!empty($request->input('name'))){
			$user->empresas->name = $request->input('name');
		}
		if(!empty($request->input('description'))){
			$user->empresas->description = $request->input('description');
		}
		if(!empty($request->input('tags'))){
			$user->empresas->tags = $request->input('tags');
			$user->empresas->nincho = $request->input('tags');
		}
		if(!empty($request->input('location'))){
			$user->empresas->location = $request->input('location');
		}
		if(!empty($request->input('tel'))){
			$user->empresas->tel = $request->input('tel');
		}
		if(!empty($request->input('email'))){
			$user->empresas->email = $request->input('email');
		}
		if(!empty($request->input('whatsapp'))){
			$user->empresas->whatsapp = $request->input('whatsapp');
		}
		if(!empty($request->input('facebook'))){
			$user->empresas->facebook = $request->input('facebook');
		}
		if(!empty($request->input('instagram'))){
			$user->empresas->instagram =$request->input('instagram');
		}
		
		if($request->hasFile('imagem') && $request->file('imagem')->isValid()){
				
			$name = uniqid(date('HisYmd'));
			$extension = $request->imagem->extension();
			$nameFile = "{$name}.{$extension}";
			$upload = $request->imagem->storeAs('logo-empresas', $nameFile);
			if ( !$upload ){
				return "error";
			}
			$user->empresas->logoMarca = $nameFile;
			$valid = $user->empresas->save();
			return response()->json($valid);
		}
		$valid = $user->empresas->save();
		return response()->json($valid);
	}

}