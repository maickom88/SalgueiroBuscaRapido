<?php

namespace App\Http\Controllers\ControllersApi;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class Post extends Controller
{
    public function uploadAction(Request $req)
    {
        if($req->hasFile('upload') && $req->file('upload')->isValid()){
            $user = User::find(1);
            $email = $user->email;
            $name = uniqid(date('HisYmd'));
			$extension = $req->upload->extension();
			$nameFile = "{$name}.{$extension}";
			$upload = $req->upload->storeAs('AlbumPost/'.$email, $nameFile);
			if ( !$upload ){
				return response()->json("ErrorSavedImg");
			}
            $echo = '{
            "uploaded" : true ,
            "url" : "http://127.0.0.1:8000/storage/AlbumPost/'.$email.'/'.$nameFile.'"
            }';
            return $echo;
		}
        else{



        return $echo;

        }
}
}
