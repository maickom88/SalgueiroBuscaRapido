<?php

namespace App\Http\Controllers\ControllersApi;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Newslatter;

class NewslatterController extends Controller
{
    public function adicionar(Request $req){
        $newslatter = new Newslatter();
        $newslatter->email = $req->input('email');
        $newslatter->name = $req->input('name');
        $valid = $newslatter->save();
        return response()->json($valid);
    }
}
