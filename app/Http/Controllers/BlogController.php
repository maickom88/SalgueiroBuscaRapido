<?php

namespace App\Http\Controllers;

use App\Contact\Contact;
use App\Empresa\Promotion\Promotion;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\Noticia;
use App\Post\Post;
use App\Post\PostView\PostView;

class BlogController extends Controller
{
    public function index(){
        $posts = Post::orderBy('id', 'desc')->paginate(6);
		if(Auth::check()){
			$idUser = Auth::user()->id;
			$user = User::find($idUser);
			return view('noticias.noticias',compact('posts', 'user'));
		}
		return view('noticias.noticias',compact('posts'));
    }

    public function artigo($nome, $id)
    {
        if(Auth::check()){
            $idUser = Auth::user()->id;
        }else
        {
            $idUser = '';
        }

        $post = Post::find($id);
        $postRecommend = Post::where('id', '!=' , $id)->orderBy('id','desc')->take(2)->get();
        $post->views++;
        $post->save();
        if(Auth::check()){
			$idUser = Auth::user()->id;
			$user = User::find($idUser);
			return view('noticias.blog',compact('post', 'user','idUser','postRecommend'));
		}
		return view('noticias.blog',compact('post','idUser'));
    }

    public function publicarPost(Request $req){
        $Iduser = Auth::user()->id;
        $user = User::find($Iduser);
        $post =  new Post();
        $post->views = 0;
        $post->title = $req->input('titlePost');
        $post->tags = $req->input('tagsPost');
        $post->conteudo = $req->input('content');
        $post->assunto = $req->input('assunto');

        if($req->hasFile('banner') && $req->file('banner')->isValid()){

			$name = uniqid(date('HisYmd'));
			$extension = $req->banner->extension();
			$nameFile = "{$name}.{$extension}";
			$upload = $req->banner->storeAs('storage/posts-header', $nameFile, 'pictures');
			if(!$upload){
				return response()->json("errorUpload");
			}
			$post->banner =  $nameFile;
		}else{
            $post->banner = 'lendo1.jpg';
        }
        $valid = $user->posts()->save($post);
        if($valid){
            session()->put('status','publicado');
            return redirect()->back();
        }
        else{
            return  response()->json('errorSaved');
        }
    }
    public function editarPost($id){
        $idUser = Auth::user()->id;
        $user = User::find($idUser);
        $postEdit = Post::find($id);
        $userNotif = User::all()->count();
        $contactNotif = Contact::all()->count();
        $promotionNotif = Promotion::all()->count();
        return view('login.dashboardManenger.noticia', compact('postEdit','user','userNotif','contactNotif','promotionNotif'));
    }

    public function editarUserPost($id){
        $idUser = Auth::user()->id;
        $user = User::find($idUser);
        $postEdit = Post::find($id);
        return view('login.dashboardUser.paginas.postarNoticias', compact('postEdit','user'));
    }
    public function publicarPostEditado(Request $req){
        $post = Post::find($req->input('idPost'));
        $post->title = $req->input('titlePost');
        $post->tags = $req->input('tagsPost');
        $post->conteudo = $req->input('content');
        $post->assunto = $req->input('assunto');

        if($req->hasFile('banner') && $req->file('banner')->isValid()){

			$name = uniqid(date('HisYmd'));
			$extension = $req->banner->extension();
			$nameFile = "{$name}.{$extension}";
			$upload = $req->banner->storeAs('storage/posts-header', $nameFile, 'pictures');
			if ( !$upload ){
				return response()->json("errorUpload");
			}
			$post->banner =  $nameFile;
		}
        $valid = $post->save();
        if($valid){
            session()->put('status','publicado');
            return redirect()->back();
        }
        else{
            return  response()->json('errorSaved');
        }
    }
}
