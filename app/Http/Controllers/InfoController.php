<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Info;
use Illuminate\Http\Request;

class InfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$info->idade = $request->input('idade');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		$idUser = Auth::id();
		$user = User::find($idUser);

		if(empty($user->info)){
			$info = new Info();
			$info->user_id = $idUser;
			$info->idade = $request->input('idade');
			$info->interesse = $request->input('interesse');
			$info->endereco = $request->input('endereco');
			$info->telefone = $request->input('telefone');
			$info->email = $request->input('email');
			if($request->hasFile('imagem') && $request->file('imagem')->isValid()){
				$name = uniqid(date('HisYmd'));
				$extension = $request->imagem->extension();
				$nameFile = "{$name}.{$extension}";
				$info->avatar = $nameFile;
				$upload = $request->imagem->storeAs('avatar', $nameFile);
				if ( !$upload ){
					return redirect()
						->back()
						->with('error', 'Falha ao fazer upload')
						->withInput();
					}
			}
			$saved = $info->save();
			if($saved){
				session()->put('info_send','ok');
					return redirect()->back();	
			}
			
			session()->put('info_send_fail','falha');
			return redirect()->back();	
		}
		else{
			if(!empty($request->input('idade'))){
				$user->info->idade = $request->input('idade');
			}
			if(!empty($request->input('interesse'))){
				$user->info->interesse = $request->input('interesse');
			}
			if(!empty($request->input('endereco'))){
				$user->info->endereco = $request->input('endereco');
			}
			if(!empty($request->input('telefone'))){
				$user->info->telefone = $request->input('telefone');
			}
			if(!empty($request->input('email'))){
				$user->info->email = $request->input('email');
			}
			if($request->hasFile('imagem') && $request->file('imagem')->isValid()){
				$name = uniqid(date('HisYmd'));
				$extension = $request->imagem->extension();
				$nameFile = "{$name}.{$extension}";
				$user->info->avatar = $nameFile;
				$upload = $request->imagem->storeAs('avatar', $nameFile);
				if ( !$upload ){
					return redirect()
						->back()
						->with('error', 'Falha ao fazer upload')
						->withInput();
					}
			}
			$saved = $user->info->save();
		
			if($saved){
				session()->put('info_send','ok');
					return redirect()->back();	
			}
			session()->put('info_send_fail','falha');
			return redirect()->back();	
		}
	}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
