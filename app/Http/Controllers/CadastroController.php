<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use App\Permission\Permission;
class CadastroController extends Controller
{
    public function cadastro(Request $req){



        
        $user = new User();
        $per = new Permission();
        $validate = $user->where('email',$req->input('email'))->count();
        if($validate==0){

            $name = $req->input('name');
            $email = $req->input('email');
            $pass = $req->input('password');
            $conf= $req->input('confpass');
            if($pass == $conf){
                if(strlen($pass)>7){
                    $user->name=$name;
                    $user->email=$email;
                    $user->password=bcrypt($pass);
                    
                    $true = $user->save();
                    $per->user = 'sim';
                    $user->permissions()->save($per);

                    if($true)
                    {
                        session()->put('user_ok','sim');
                        return redirect()->back();
                    }
                    else{
                        session()->put('error','sim');
                        return redirect()->back();
                    }

                }
                else{
                    session()->put('senha_fraca','sim');
                    return redirect()->back()->withInput();
                }
            }
            else{
                session()->put('senha_in','sim');
                return redirect()->back();
            }
        }
        else{
            session()->put('user_exist','sim');
                return redirect()->back();
        }
        

    }
}
