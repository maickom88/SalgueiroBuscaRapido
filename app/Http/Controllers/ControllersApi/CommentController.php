<?php

namespace App\Http\Controllers\ControllersApi;

use App\Comment\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Empresa\Empresa;
use App\Post\Post;
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
	public function listarComment($id, $idUser){
        $idUser = $idUser;
		$todas = "MostrarTodas";
		$empresa = Empresa::find($id);

		return view('paginaIndividual.pageComments', compact('empresa','idUser'));
	}
    public function adicionarCommentPost(Request $request){
		$comment = new Comment();
		$comment->user_id = $request->input('idUser');
		$comment->post_id = $request->input('idPost');
		$comment->content = $request->input('message');
		$comment->avaliacao = $request->input('estrela');
		$valid = $comment->save();
		return response()->json($request->input($valid));
	}
    public function listarCommentPost($id,$idUser){
        $idUser = $idUser;
		$todas = "MostrarTodas";
        $post = Post::find($id);
		return view('noticias.pageComments', compact('post','idUser'));
	}
    public function excluirComment(Request $req){
        $idComment = $req->input('idComment');
        $comment = Comment::find($idComment);
        $valid = $comment->delete();
        return response()->json($valid);
    }
}
