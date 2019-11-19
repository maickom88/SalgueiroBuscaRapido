<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact\Contact;
use App\User;
use Illuminate\Support\Facades\Auth;
class ContatoController extends Controller
{

	public function index(){
		return 'ola';
	}
	public function send(Request $dados)
	{
		$contato = new Contact();
		$contato->name = $dados->input('nome');
		$contato->email = $dados->input('email');
		$contato->tel = $dados->input('tel');
		$contato->content = $dados->input('content');
		$saved = $contato->save();
		
		if($saved){
			$var = true;
			return json_encode($var);            
		}
		else{
			$var = false;
			return json_encode($var);
		}
		
		
	}    
	}
