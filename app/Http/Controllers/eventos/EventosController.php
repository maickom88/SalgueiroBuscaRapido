<?php

namespace App\Http\Controllers\eventos;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EventosController extends Controller
{
    public function index(){
        return view('eventos.eventos');
    }
    public function evento(){
        return view('eventos.eventosIndividual');
    }
}
