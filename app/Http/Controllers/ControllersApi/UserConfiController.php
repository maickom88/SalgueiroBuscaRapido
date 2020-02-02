<?php

namespace App\Http\Controllers\ControllersApi;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class UserConfiController extends Controller
{
    public function alterarSenha(Request $req){
        $user = User::find($req->input('user'));
        $user->password=bcrypt($req->input('senha'));
        $valid = $user->save();
        return response()->json($valid);
    }
}
