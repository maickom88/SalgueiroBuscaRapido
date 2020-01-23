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


Route::post('administrativo/parceria/negar', 'ControllersApi\AdmController@parceriaNegar');


Route::get('empresa/like/{empresaId}/{userId}', 'ControllersApi\LikeController@like');


Route::get('administrativo/empresas/lista-todas-mensagens', 'ControllersApi\AdmController@listarTodasMensagens');


Route::get('administrativo/usuarios/lista-todos-usuarios', 'ControllersApi\AdmController@listarUsuarios');



Route::get('administrativo/usuarios/lista-usuarios', 'ControllersApi\AdmController@usuariosPaginate');



Route::get('administrativo/lista-parcerias-ativas', 'ControllersApi\AdmController@listarTodasParceriasAtivas');


Route::get('administrativo/lista-parcerias-pendentes', 'ControllersApi\AdmController@listarTodasParceriasPendentes');


Route::post('administrativo/empresas/parceria/update', 'ControllersApi\AdmController@updatePartner');

Route::get('empresa/lista-comments-page/{id}', 'ControllersApi\CommentController@listarComment');



Route::get('empresa/deslike/{empresaId}/{userId}', 'ControllersApi\LikeController@deslike');

Route::get('likeEmp/{empresaId}/{userId}', 'ControllersApi\LikeController@isLike');

Route::post('empresa/comentar', 'ControllersApi\CommentController@adicionarComment');

Route::post('painel/postar', 'ControllersApi\FeedController@postar');


Route::get('page-novidades/{id}', 'ControllersApi\FeedController@show');

Route::resource('painel/editar/empresa', 'ControllersApi\EmpresaController');


Route::post('administrativo/usuarios/editar', 'ControllersApi\AdmController@updateUser');

Route::post('administrativo/usuarios/excluir', 'ControllersApi\AdmController@deleteUser');


Route::get('administrativo/empresas/listar-contratos', 'ControllersApi\AdmController@listarTodosContratos');


Route::get('administrativo/empresas/contratos', 'ControllersApi\AdmController@listarContratos');


Route::post('administrativo/empresas/contrato/update', 'ControllersApi\AdmController@contratoUpdate');


Route::post('painel/novidade/deletar', 'ControllersApi\Empresas@deleteNovidades');



Route::post('mensagem', 'ControllersApi\AdmController@mensagemUser');



Route::get('administrativo/empresas/contratos-expirados', 'ControllersApi\AdmController@listarContratosExpirados');



Route::get('administrativo/eventos/publicados', 'ControllersApi\EventoController@listarEventosPublicados');


Route::get('administrativo/eventos/buscar', 'ControllersApi\EventoController@buscarEventos');


Route::get('administrativo/promocoes', 'ControllersApi\AdmController@promocoes');

Route::get('administrativo/promocoes/listar-promocoes', 'ControllersApi\AdmController@listarPromocoes');


Route::post('administrativo/promocoes/excluir', 'ControllersApi\AdmController@excluirPromocao');


Route::post('administrativo/eventos/excluir', 'ControllersApi\EventoController@excluirEventos');


Route::post('empresario/promocao/add', 'ControllersApi\Empresas@adicionarPromocao');


Route::post('post/upload', 'ControllersApi\Post@uploadAction');



Route::post('administrativo/post/excluir', 'ControllersApi\Post@excluirPost');



Route::get('administrativo/posts/buscar', 'ControllersApi\Post@postsBuscar');


Route::get('administrativo/post/publicados', 'ControllersApi\Post@postsPublicados');



Route::get('empresario/verifica-promocao/{id}', 'ControllersApi\Empresas@verificaPromocao');

Route::get('dashboard/post/{id}', 'ControllersApi\Post@postsUserPublicados');



Route::get('evento/eventos', 'ControllersApi\EventoController@eventos');
