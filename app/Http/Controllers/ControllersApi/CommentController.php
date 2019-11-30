<?php

namespace App\Http\Controllers\ControllersApi;

use App\Comment\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Empresa\Empresa;

class CommentController extends Controller
{
	public function adicionarComment(Request $request){
		$comment = new Comment();
		$comment->user_id = $request->input('idUser');
		$comment->empresa_id = $request->input('idEmp');
		$comment->content = $request->input('message');
		$comment->avaliacao = $request->input('estrela');
		$valid = $comment->save();
		return response()->json($request->input($valid));
	}
	public function listarComment($id){
		$todas = "MostrarTodas";
		$empresa = Empresa::find($id);

		return view('paginaIndividual.pageComments', compact('empresa'));
	}
}
