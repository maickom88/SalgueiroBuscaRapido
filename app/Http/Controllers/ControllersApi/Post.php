<?php

namespace App\Http\Controllers\ControllersApi;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post\Post as PostModal;
use App\User;
use Illuminate\Support\Facades\Auth;

class Post extends Controller
{
    public function uploadAction(Request $req)
    {
        if($req->hasFile('upload') && $req->file('upload')->isValid()){
            $user = Auth::user()->id;
				$id = $user->id;
				$name = uniqid(date('HisYmd'));
				$extension = $req->upload->extension();
				$nameFile = "{$name}.{$extension}";
				$upload = $req->upload->storeAs('storage/AlbumPost/'.$id, $nameFile, 'pictures');
			if ( !$upload ){
				return response()->json("ErrorSavedImg");
			}
            $echo = '{
            "uploaded" : true ,
            "url" : "http://127.0.0.1:8000/storage/AlbumPost/'.$id.'/'.$nameFile.'"
            }';
            return $echo;
	}
		else{
		return $echo;
		}
	}
    public function postsPublicados(Request $request){
        $posts = PostModal::orderBy('id', 'desc')->paginate(5);
		if(Auth::check()){
			$idUser = Auth::user()->id;$user = User::find($idUser);

		return view('login.dashboardManenger.postsPublicadosTable', compact('user','posts'));
		}
		return view('login.dashboardManenger.postsPublicadosTable', compact('posts'));
	}
    public function postsUserPublicados($id){
        $posts = PostModal::where('user_id', $id)->orderBy('id', 'desc')->paginate(5);

        return view('login.dashboardUser.paginas.tableUserPosts', compact( 'posts'));
	}
    public function postsBuscar(Request $request){
        $posts = PostModal::all();
        $todas = "MostrarTodas";
		if(Auth::check()){
			$idUser = Auth::user()->id;$user = User::find($idUser);

		return view('login.dashboardManenger.postsPublicadosTable', compact('user','posts','todas'));
		}
		return view('login.dashboardManenger.postsPublicadosTable', compact('posts', 'todas'));
	}
    public function excluirPost(Request $dados){
        $id = $dados->input('IdUser');
        $post = PostModal::find($id);
        $valid = $post->delete();
        return response()->json($valid);
    }

    public function postsView(Request $request){
        $posts = PostModal::orderBy('id', 'desc')->paginate(6);
		if(Auth::check()){
			$idUser = Auth::user()->id;$user = User::find($idUser);

		return view('noticias.noticiasPaginate', compact('user','posts'));
		}
		return view('noticias.noticiasPaginate', compact('posts'));
	}
}
