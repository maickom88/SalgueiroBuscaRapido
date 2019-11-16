<?php

namespace App\Http\Controllers\ControllersApi;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EmpresaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
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
        $user = User::find($id);



		if(isset($user->permissions->empresas)){
			$user->empresas->name = $request->input('name');
			$user->empresas->description = $request->input('description');
			$user->empresas->nincho = $request->input('tags');
			$user->empresas->description = $request->input('description');
			$user->empresas->location = $request->input('location');
			$user->empresas->tel = $request->input('tel');
			$user->empresas->Whatsapp = $request->input('whatsapp');
			$user->empresas->email = $request->input('email');
			$user->empresas->facebook = $request->input('facebook');
			$user->empresas->instagram = $request->input('instagram');
			$user->empresas->save();
			return json_encode($request->input('name'));
		}
			return response('Falaha na operação, tente novamente mas tarde', 404);
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
