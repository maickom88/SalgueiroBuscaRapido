<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function login(Request $dados)
    {

        $user = new User();
        $valider = $user->where('email',$dados->email)->count();

        if($valider==1){
            $credenciais = [
                'email'=> $dados->email,
                'password'=> $dados->password
            ];

            $authOK = Auth::guard()->attempt($credenciais);
            if($authOK)
            {
            return redirect()->intended(route('dashboard'));
            }
            session()->put('user_errorPass', 'sim');
            return redirect()->back();
        }
        session()->put('user_notExist','sim');
        return redirect()->back();
    }
}
