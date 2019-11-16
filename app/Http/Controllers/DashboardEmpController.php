<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Charts\GraficoMensal;


class DashboardEmpController extends Controller
{

   
        public function loginEmp(Request $dados)
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
                    $userID = Auth::user()->id;
                    $validEmp = $user->find($userID)->permissions->empresario;
                    if($validEmp=='sim')
                    {
								
								return redirect()->intended(route('painel'));
                    }
                    else
                    {
                        Auth::logout();
                        session()->put('user_notEmp', 'sim');
                        return redirect()->back();
                    }
                }
                session()->put('user_errorPass', 'sim');
                return redirect()->back();
            }
            session()->put('user_notExist','sim');
            return redirect()->back();
        }
			
}
