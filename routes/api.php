<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
   return $request->user();
});

//-----------------------Rota de inserir mensagem de contato no banco de dados-----------//
Route::post('/contato/mensagem',['uses'=>'ContatoController@send'])->name('contato.send');


//-----------------------Rota de inserir mensagem de pedido de parceria no banco de dados-----------//
Route::post('/dashboard/parceria',['uses'=>'ParceriaController@send'])->name('parceria.send');


Route::get('painel/empresa/editar/{id}', 'ControllersApi\Empresas@edit')->name('editEmpApi');

Route::get('painel/info/user/{id}', 'ControllersApi\UserInfoController@show')->name('infoUserApi');

Route::post('painel/info/alterar', 'ControllersApi\UserInfoController@update')->name('alteraInfoApi');

Route::post('painel/empresa/editar/alterar', 'ControllersApi\Empresas@update')->name('alteraEmpApi');
	
Route::post('administrativo/empresas/cadastro', 'ControllersApi\AdmController@adicionarEmpresa')->name('addEmp');

Route::get('administrativo/empresas', 'ControllersApi\AdmController@listarEmpresas')->name('listarEmp');


Route::get('administrativo/empresas/lista', 'ControllersApi\AdmController@listarTodasEmpresas')->name('listarTodasEmp');

Route::get('administrativo/empresas/desativadas', 'ControllersApi\AdmController@listarEmpresasDesativadas');


Route::get('administrativo/empresas/ativas', 'ControllersApi\AdmController@listarEmpresasAtivas');



Route::post('administrativo/empresas/excluir', 'ControllersApi\AdmController@excluirEmpresas');

Route::get('administrativo/empresas/buscar/{id}', 'ControllersApi\AdmController@buscarEmp');


Route::post('administrativo/empresas/editar', 'ControllersApi\AdmController@editarEmpresa');


Route::get('administrativo/lista-contato', 'ControllersApi\AdmController@mensagens');


Route::post('administrativo/lista-contato/exlcuir', 'ControllersApi\AdmController@excluirMensagens');



Route::post('administrativo/parceria/aprovar', 'ControllersApi\AdmController@parceriaAprovar');


Route::get('empresa/like/{empresaId}/{userId}', 'ControllersApi\LikeController@like');



Route::get('empresa/deslike/{empresaId}/{userId}', 'ControllersApi\LikeController@deslike');

Route::get('likeEmp/{empresaId}/{userId}', 'ControllersApi\LikeController@isLike');


Route::resource('painel/editar/empresa', 'ControllersApi\EmpresaController');