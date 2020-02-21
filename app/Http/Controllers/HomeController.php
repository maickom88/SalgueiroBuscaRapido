<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Empresa\Empresa;
use Illuminate\Support\Facades\Auth;
USE App\Post\Post;
use App\pageView\View;
use App\Empresa\Promotion\Promotion;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $empresa = Empresa::where('status', 'ativa')->count();
        if($empresa > 6){
            $empresa = Empresa::where('status','ativa')->get()->random(6);
        }else
        {
            $empresa = Empresa::where('status', 'ativa')->get();
        }

        $posts = Post::orderBy('id','desc')->limit(3)->get();
			$view = new View;
		$promotions = Promotion::where('status','sim')->orderBy('id','desc')->get();
		foreach($empresa as $emp){

			$emp->views->views++;
			$emp->views->save();

		}

        if (Auth::check()) {
            $userId = Auth::user()->id;
            $user = User::find($userId);
		return view('home.index', compact('empresa', 'user','posts','promotions'));
		}
		return view('home.index', compact('empresa', 'posts','promotions'));

    }
}
