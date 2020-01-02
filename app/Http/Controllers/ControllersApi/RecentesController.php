<?php

namespace App\Http\Controllers\ControllersApi;

use App\Empresa\Empresa;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Like;
use App\User;
use Illuminate\Support\Facades\Auth;

class RecentesController extends Controller
{
    public function recentes(){
        $idUser = Auth::id();
        $idEmpresa = [];
        $user = User::find($idUser);
        $empresas = $user->likes;
        foreach ($empresas as $empresa) {
            array_push($idEmpresa, $empresa->empresa_id);
        }
        $empresas = Empresa::whereIn('id', $empresas)->get();

        return view('atividades.recentes', compact('empresas'));
    }
}
