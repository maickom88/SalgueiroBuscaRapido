<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TermosController extends Controller
{
    public function condicoes(){
        if(Auth::check()){

        $userId = Auth::user()->id;
        $user = User::find($userId);

        return view('termos.uso', compact('user'));
        }
        return view('termos.uso');

    }

    public function privacidade(){
        if(Auth::check()){
        $userId = Auth::user()->id;
        $user = User::find($userId);
        return view('termos.privacidade', compact('user'));
        }
        return view('termos.privacidade');
    }
}
