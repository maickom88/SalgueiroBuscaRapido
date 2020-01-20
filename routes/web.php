<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Support\Facades\Route;

//-----------------------Pagina Inicial---------------------//
Route::get('/', ['uses'=>'IndexController@index'])->name('home');

//------------------------Noticias---------------------------//
Route::get('/noticias',['uses'=>'BlogController@index'])->name('blog.noticias');


//------------------------Pagina da empresa---------------------------//
Route::get('/empresa/{nomeEmpresa}/{id}',['uses'=>'PaginaIndividualController@page'])->name('pagina.empresa');


//-----------------------Noticias individual------------------------//
Route::get('/noticias/{titulo?}/{id?}',['uses'=>'BlogController@artigo'])->name('blog.page');

//----------------------Pagina de contato----------------------------//
Route::get('/contato',['uses'=>'IndexController@contato'])->name('contato.home');

//----------------------Pagina de login------------------------------//
Route::get('/iniciar-sessao',['uses'=>'IndexController@login'])->name('login.home');

//----------------------Pagina de cadastro-----------------------------//
Route::get('/cadastro',['uses'=>'IndexController@cadastro'])->name('cadastro.site');

//------------------------Rota de inserir usuario no banco de dados-------------//
Route::post('/cadastro/cadastrar', ['uses'=>'CadastroController@cadastro'])->name('cadastrar.site');

//----------------------Rota de autenticação do usúario----------------//
Route::post('/iniciar-sessao/login',['uses'=>'LoginController@login'])->name('logar.site');


//-----------------------Painel do Usúario-------------------------------------//
Route::get('/dashboard', ['uses'=>'DashboardController@index'])->name('dashboard');

//----------------------Rota de perfil do usúario-----------------------------//
Route::get('/dashboard/perfil','DashboardController@perfil')->name('userPerfil');
//----------------------Rota de alterar informações do perfil do usúario-----------------------------//
Route::post('/dashboard/perfil/alterar','InfoController@store')->name('alterar');
//--------------------Rota de logout da conta do usúario-------------------------//
Route::get('/dashboard/sair', ['uses'=>'DashboardController@logout'])->name('logoutUser');



//----------------------Rota de Lista de empresas favoritas do usúario-----------------------------//
Route::get('/dashboard/lista-empresas','DashboardController@listaEmpresas')->name('listaEmp');

//----------------------Rota de noticias do usúario-----------------------------//
Route::get('/dashboard/noticias','DashboardController@noticia')->name('noticia');


//----------------------Rota de eventos do usúario-----------------------------//
Route::get('/dashboard/eventos','DashboardController@eventos')->name('eventosUser');


//----------------------Rota de parceiro do usúario-----------------------------//
Route::get('/dashboard/parceiro','DashboardController@parceiro')->name('parceiroUser');
Route::post('/dashboard/parceiro/enviar',['uses'=>'ParceriaController@send'])->name('parceria.send');


//----------------------Rota de autenticação do empresario----------------------------------//
Route::post('/iniciar-sessao', ['uses'=>'DashboardEmpController@loginEmp'])->name('dashboard_emp');

//-----------------------Painel do empresario-------------------------//
Route::get('/painel', ['uses'=>'PainelEmpresarialController@index'])->name('painel');

//-----------------------Rota de perfil do empresario-------------------------//
Route::get('/painel/perfil', ['uses'=>'PainelEmpresarialController@perfil'])->name('perfilEmp');

//-----------------------Rota de perfil do empresario-------------------------//
Route::get('/painel/empresa', ['uses'=>'PainelEmpresarialController@editEmp'])->name('editarEmp');

//-----------------------Rota de Alterar dados do empresa-------------------------//
Route::post('/painel/empresa/alterar', ['uses'=>'PainelEmpresarialController@alterarEmp'])->name('alterarEmp');





//-----------------------Rota de tabela de pagamento do empresario-------------------------//
Route::get('/painel/tabela-pagamento', ['uses'=>'PainelEmpresarialController@pagamento'])->name('pagEmp');

//-----------------------Rota de postagens empresario-------------------------//
Route::get('/painel/postagens', ['uses'=>'PainelEmpresarialController@postagens'])->name('postsEmp');


//-----------------------Rota de postar do perfil do empresario-------------------------//
Route::get('/painel/publicar', ['uses'=>'PainelEmpresarialController@postagens'])->name('postarEmp');

//-----------------------Rota de comentarios  do  perfil do empresario-------------------------//
Route::get('/painel/comentarios', ['uses'=>'PainelEmpresarialController@comentarios'])->name('comentEmp');


//-----------------------Rota de Noticias do  perfil do empresario-------------------------//
Route::get('/painel/noticias', ['uses'=>'PainelEmpresarialController@noticias'])->name('noticiasEmp');


//-----------------------Rota de Eventos do  perfil do empresario-------------------------//
Route::get('/painel/eventos', ['uses'=>'PainelEmpresarialController@eventos'])->name('eventEmp');


//-----------------------Rota de sair do painel  perfil do empresario--------------//
Route::get('/painel/sair', ['uses'=>'PainelEmpresarialController@logout'])->name('logoutEmp');



//-----------------------Rota de empresas do perfil adm--------------//
Route::get('administrativo/empresas', ['uses'=>'PainelManengerController@empresas'])->name('empManenger');



//-----------------------Rota de Perfil de Conta do perfil adm--------------//
Route::get('administrativo/perfil', ['uses'=>'PainelManengerController@perfiluser'])->name('perfilUserManenger');


//-----------------------Rota de usúarios do perfil adm--------------//
Route::get('administrativo/usuarios', ['uses'=>'PainelManengerController@usuarios'])->name('userManenger');


//-----------------------Rota de contato do perfil adm--------------//
Route::get('administrativo/contato', ['uses'=>'PainelManengerController@contato'])->name('contatoManenger');


//-----------------------Rota de parceria do perfil adm--------------//
Route::get('administrativo/parceria', ['uses'=>'PainelManengerController@parceria'])->name('parceriaManenger');


//-----------------------Rota de pagamento do perfil adm--------------//
Route::get('administrativo/pagamento', ['uses'=>'PainelManengerController@pagamento'])->name('pagamentoManenger');

Route::get('/eventos/{nome}_{id}', 'eventos\EventosController@eventoIndividual')->name('eventoIndividual');

Route::get('/eventos', 'IndexController@eventos')->name('eventos');


//-----------------------Rota de Evento do perfil adm--------------//
Route::get('administrador/eventos', ['uses'=>'PainelManengerController@evento'])->name('eventoManenger');

//-----------------------Rota de Evento do perfil adm--------------//
Route::get('administrador/eventos-publicados', ['uses'=>'PainelManengerController@eventosPublicados'])->name('eventosPublicados');

//-----------------------Rota de Evento do perfil adm--------------//
Route::get('administrador/publicar/noticia', ['uses'=>'PainelManengerController@publicarNoticia'])->name('blogManenger');



//-----------------------Rota de Publicar Evento do perfil adm--------------//
Route::post('administrador/eventos/publicar', 'eventos\EventosController@publicar')->name('publicarEventos');


//-----------------------Rota de Publicar Evento do perfil adm--------------//
Route::get('administrador/promocoes', 'PainelManengerController@promocoes')->name('promocaoManenger');




Auth::routes();

Route::get('/home', 'HomeController@index')->name('homeLara');

