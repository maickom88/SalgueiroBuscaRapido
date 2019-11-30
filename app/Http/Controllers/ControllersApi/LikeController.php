<?php

namespace App\Http\Controllers\ControllersApi;

use App\Empresa\Empresa;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Like;

class LikeController extends Controller
{
   public function like($empresaId, $userId){
		$count = Like::where('empresa_id', $empresaId)->where('user_id', $userId)->get()->count();
		if($count == 1){
			 $like = Like::where('empresa_id', $empresaId)->where('user_id', $userId)->get();
			$valid = $like[0]->delete();
			return response()->json($valid);
		}
		else{
			$like = new Like();	
			$like->user_id = $userId;
			$like->empresa_id = $empresaId;
			$valid = $like->save();
			return response()->json($valid);
		}
	}
	public function isLike( $empresaId, $userId){
		$valid = $like = Like::where('empresa_id',$empresaId,)->where('user_id', $userId)->get()->count(); 
		$emp = Empresa::find($empresaId);
		$count = $emp->likes->count();
		return response()->json([$valid, $count]);
	}
}
