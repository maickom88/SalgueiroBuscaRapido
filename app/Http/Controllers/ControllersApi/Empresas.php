<?php

namespace App\Http\Controllers\ControllersApi;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Empresa\Empresa;
use App\Empresa\Feed\NovidadeEmpresa;
use App\Empresa\Promotion\Promotion;
use App\Empresa\Album\Album;
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
			$upload = $request->imagem->storeAs('storage/logo-empresas', $nameFile, 'pictures');
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
    public function deleteNovidades(Request $dados){
        $id = $dados->input('idNovidade');
        $novidade =  NovidadeEmpresa::find($id);
        if(!$novidade->photos->isEmpty()){
            $validPhoto = $novidade->photos[0]->where('novidade_empresa_id', $id)->delete();
        }
        $valid = $novidade->delete();
        return response()->json($valid);
    }

    public function adicionarPromocao(Request $req){
        $empresa = Empresa::find($req->input('idEmpresa'));
        $promotion = new Promotion();

        if(empty($empresa->promotion)){
            $promotion->title = $req->input('nomeProduto');
            $promotion->description = $req->input('descricaoProduto');
            $promotion->valor = $req->input('valorProduto');
            $promotion->desconto = $req->input('descontoProduto');
            $promotion->title = $req->input('nomeProduto');
            $promotion->data_fim_promocao = $req->input('fimPromocao');
            if($req->hasFile('banner') && $req->file('banner')->isValid()){

                $name = uniqid(date('HisYmd'));
                $extension = $req->banner->extension();
                $nameFile = "{$name}.{$extension}";
                $upload = $req->banner->storeAs('storage/promocoes', $nameFile, 'pictures');
                if ( !$upload ){
                    return response()->json("ErrorSavedImg");
                }
                $promotion->photo = $nameFile;
            }
            $valid = $empresa->promotion()->save($promotion);
            return response()->json($valid);
        }

        $empresa->promotion->title = $req->input('nomeProduto');
        $empresa->promotion->description = $req->input('descricaoProduto');
        $empresa->promotion->valor = $req->input('valorProduto');
        $empresa->promotion->desconto = $req->input('descontoProduto');
        $empresa->promotion->title = $req->input('nomeProduto');
        $empresa->promotion->data_fim_promocao = $req->input('fimPromocao');
        if($req->hasFile('banner') && $req->file('banner')->isValid()){

            $name = uniqid(date('HisYmd'));
            $extension = $req->banner->extension();
            $nameFile = "{$name}.{$extension}";
            $upload = $req->banner->storeAs('storage/promocoes', $nameFile, 'pictures');
            if ( !$upload ){
                return response()->json("ErrorSavedImg");
            }
            $empresa->promotion->photo = $nameFile;
        }
        $valid = $empresa->promotion->save();

        return response()->json($valid);
    }
    public function verificaPromocao(Request $request, $id)
	{
        $user = User::find($id);
        $promotion = $user->permissions->empresas->promotion;
        if ($request->ajax()) {
			return view('login.dashboard.paginas.cardPromotion', compact('promotion'));
		}
		return view('login.dashboard.paginas.cardPromotion',compact('promotion'));

	}
    public function deletPhoto(Request $req){
			$id = $req->input('photo');
			$photoAlbum = Album::find($id);
			$valid = $photoAlbum->delete();
			return response()->json($valid);
	}
}
