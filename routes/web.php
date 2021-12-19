<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AgendaController;
use App\Http\Controllers\ComunidadeController;
use App\Http\Controllers\NoticiasController;
use App\Http\Controllers\ContactosController;
use App\Http\Controllers\AdminNoticiasController;
use App\Http\Controllers\AdminNumerosFactosController;
use App\Http\Controllers\AdminTestemunhosController;
use App\Http\Controllers\AdminBannerController;
use App\Http\Controllers\AdminSobreNosController;
use App\Http\Controllers\AdminContactosController;
use App\Http\Controllers\AdminRedesSociaisController;
use App\Http\Controllers\AdminPessoaController;
use App\Http\Controllers\AdminAgendaController;
use App\Http\Controllers\AdminReservaController;
use App\Http\Controllers\AdminPedidoContactoController;
use App\Http\Controllers\AdminInteresseController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\MentoriaController;
use App\Mail\NovoMentor;
use Illuminate\Support\Facades\Mail;

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

Route::get('/', function () {
    return redirect()->route('home', app()->getLocale());
});

/*Português*/

Route::get('/home', [HomeController::class, 'index'])->name('home');

/*AGENDA*/
Route::get('/agenda', [AgendaController::class, 'index']);
Route::get('/agenda/{id}', [AgendaController::class, 'ver_agenda']);
Route::get('/reservar_agenda/{id}', [AgendaController::class, 'reservar_agenda']);
Route::post('/reservar_agenda/{id}', [AgendaController::class, 'store']);

/*COMUNIDADE*/
Route::get('/comunidade', [ComunidadeController::class, 'index']);
Route::get('/pessoa/{id}', [ComunidadeController::class, 'ver_pessoa']);

/*MENTORIA*/
Route::get('/mentoria', [MentoriaController::class, 'index']);
Route::get('/mentor/{id}', [MentoriaController::class, 'ver_mentor']);

/*NOTICIAS*/
Route::get('/noticias', [NoticiasController::class, 'index']);
Route::get('/noticias/{id}', [NoticiasController::class, 'ver_noticia']);

/*CONTACTOS*/
Route::get('/contactos', [ContactosController::class, 'index']);
Route::post('/pedido_contacto', [ContactosController::class, 'store']);



/*ADMIN*/

/*NOTICIAS*/
Route::get('/admin/noticias', [AdminNoticiasController::class, 'noticias'])->middleware('auth');
Route::get('/admin/criar_noticias', [AdminNoticiasController::class, 'criar_noticias'])->middleware('auth');
Route::post('/admin/noticias', [AdminNoticiasController::class, 'store'])->middleware('auth');
Route::get('/admin/editar_noticias/{id}', [AdminNoticiasController::class, 'editar_noticia'])->middleware('auth');
Route::put('/admin/atualizar_noticias/{id}', [AdminNoticiasController::class, 'atualizar_noticia'])->middleware('auth');
Route::delete('/admin/noticias/{id}', [AdminNoticiasController::class, 'apagar_noticia'])->middleware('auth');

    /*GALERIA*/
Route::get('/admin/galeria_noticias', [AdminNoticiasController::class, 'galeria_noticias'])->middleware('auth');
Route::post('/admin/galeria_noticias/{id}', [AdminNoticiasController::class, 'store_galeria'])->middleware('auth');
Route::get('/admin/adicionar_galeria_noticias/{id}', [AdminNoticiasController::class, 'adicionar_galeria_noticia'])->middleware('auth');
Route::delete('/admin/galeria_noticias/{id}', [AdminNoticiasController::class, 'apagar_galeria_noticia'])->middleware('auth');

/*NUMEROS E FACTOS*/
Route::get('/admin/numeros_factos', [AdminNumerosFactosController::class, 'numeros_factos'])->middleware('auth');
Route::get('/admin/criar_numeros_factos', [AdminNumerosFactosController::class, 'criar_numeros_factos'])->middleware('auth');
Route::post('/admin/numeros_factos', [AdminNumerosFactosController::class, 'store'])->middleware('auth');
Route::get('/admin/editar_numeros_factos/{id}', [AdminNumerosFactosController::class, 'editar_numeros_factos'])->middleware('auth');
Route::put('/admin/atualizar_numeros_factos/{id}', [AdminNumerosFactosController::class, 'atualizar_numeros_factos'])->middleware('auth');
Route::delete('/admin/numeros_factos/{id}', [AdminNumerosFactosController::class, 'apagar_numeros_factos'])->middleware('auth');

/*TESTEMUNHOS*/
Route::get('/admin/testemunhos', [AdminTestemunhosController::class, 'testemunhos'])->middleware('auth');
Route::get('/admin/criar_testemunhos', [AdminTestemunhosController::class, 'criar_testemunhos'])->middleware('auth');
Route::post('/admin/testemunhos', [AdminTestemunhosController::class, 'store'])->middleware('auth');
Route::get('/admin/editar_testemunhos/{id}', [AdminTestemunhosController::class, 'editar_testemunhos'])->middleware('auth');
Route::put('/admin/atualizar_testemunhos/{id}', [AdminTestemunhosController::class, 'atualizar_testemunhos'])->middleware('auth');
Route::delete('/admin/testemunhos/{id}', [AdminTestemunhosController::class, 'apagar_testemunhos'])->middleware('auth');

/*BANNER*/
Route::get('/admin/banner', [AdminBannerController::class, 'banner'])->middleware('auth');
Route::get('/admin/criar_banner', [AdminBannerController::class, 'criar_banner'])->middleware('auth');
Route::post('/admin/banner', [AdminBannerController::class, 'store'])->middleware('auth');
Route::get('/admin/editar_banner/{id}', [AdminBannerController::class, 'editar_banner'])->middleware('auth');
Route::put('/admin/atualizar_banner/{id}', [AdminBannerController::class, 'atualizar_banner'])->middleware('auth');
Route::delete('/admin/banner/{id}', [AdminBannerController::class, 'apagar_banner'])->middleware('auth');

/*SOBRE NÓS*/
Route::get('/admin/sobre_nos', [AdminSobreNosController::class, 'sobre_nos'])->middleware('auth');
Route::get('/admin/criar_sobre_nos', [AdminSobreNosController::class, 'criar_sobre_nos'])->middleware('auth');
Route::post('/admin/sobre_nos', [AdminSobreNosController::class, 'store'])->middleware('auth');
Route::get('/admin/editar_sobre_nos/{id}', [AdminSobreNosController::class, 'editar_sobre_nos'])->middleware('auth');
Route::put('/admin/atualizar_sobre_nos/{id}', [AdminSobreNosController::class, 'atualizar_sobre_nos'])->middleware('auth');
Route::delete('/admin/sobre_nos/{id}', [AdminSobreNosController::class, 'apagar_sobre_nos'])->middleware('auth');

/*CONTACTOS*/
Route::get('/admin/contactos', [AdminContactosController::class, 'contactos'])->middleware('auth');
Route::get('/admin/editar_contactos/{id}', [AdminContactosController::class, 'editar_contactos'])->middleware('auth');
Route::put('/admin/atualizar_contactos/{id}', [AdminContactosController::class, 'atualizar_contactos'])->middleware('auth');

/*REDES SOCIAIS*/
Route::get('/admin/redes_sociais', [AdminRedesSociaisController::class, 'redes_sociais'])->middleware('auth');
Route::get('/admin/criar_redes_sociais', [AdminRedesSociaisController::class, 'criar_redes_sociais'])->middleware('auth');
Route::post('/admin/redes_sociais', [AdminRedesSociaisController::class, 'store'])->middleware('auth');
Route::get('/admin/editar_redes_sociais/{id}', [AdminRedesSociaisController::class, 'editar_redes_sociais'])->middleware('auth');
Route::put('/admin/atualizar_redes_sociais/{id}', [AdminRedesSociaisController::class, 'atualizar_redes_sociais'])->middleware('auth');
Route::delete('/admin/redes_sociais/{id}', [AdminRedesSociaisController::class, 'apagar_redes_sociais'])->middleware('auth');

/*PESSOA*/
Route::get('/admin/pessoa', [AdminPessoaController::class, 'pessoa'])->middleware('auth');
Route::get('/admin/criar_pessoa', [AdminPessoaController::class, 'criar_pessoa'])->middleware('auth');
Route::post('/admin/pessoa', [AdminPessoaController::class, 'store'])->middleware('auth');
Route::get('/admin/editar_pessoa/{id}', [AdminPessoaController::class, 'editar_pessoa'])->middleware('auth');
Route::put('/admin/atualizar_pessoa/{id}', [AdminPessoaController::class, 'atualizar_pessoa'])->middleware('auth');
Route::delete('/admin/pessoa/{id}', [AdminPessoaController::class, 'apagar_pessoa'])->middleware('auth');

/*AGENDA*/
Route::get('/admin/agenda', [AdminAgendaController::class, 'agenda'])->middleware('auth');
Route::get('/admin/criar_agenda', [AdminAgendaController::class, 'criar_agenda'])->middleware('auth');
Route::post('/admin/agenda', [AdminAgendaController::class, 'store'])->middleware('auth');
Route::get('/admin/editar_agenda/{id}', [AdminAgendaController::class, 'editar_agenda'])->middleware('auth');
Route::put('/admin/atualizar_agenda/{id}', [AdminAgendaController::class, 'atualizar_agenda'])->middleware('auth');
Route::delete('/admin/agenda/{id}', [AdminAgendaController::class, 'apagar_agenda'])->middleware('auth');
    /*GALERIA*/
Route::get('/admin/galeria_agenda', [AdminAgendaController::class, 'galeria_agenda'])->middleware('auth');
Route::post('/admin/galeria_agenda/{id}', [AdminAgendaController::class, 'store_galeria'])->middleware('auth');
Route::get('/admin/adicionar_galeria_agenda/{id}', [AdminAgendaController::class, 'adicionar_galeria_agenda'])->middleware('auth');
Route::delete('/admin/galeria_agenda/{id}', [AdminAgendaController::class, 'apagar_galeria_agenda'])->middleware('auth');


/*RESERVA*/
Route::get('/admin/reserva', [AdminReservaController::class, 'reserva'])->middleware('auth');
Route::get('/admin/editar_reserva/{id}', [AdminReservaController::class, 'editar_reserva'])->middleware('auth');
Route::put('/admin/atualizar_reserva/{id}', [AdminReservaController::class, 'atualizar_reserva'])->middleware('auth');
Route::delete('/admin/reserva/{id}', [AdminReservaController::class, 'apagar_reserva'])->middleware('auth');

/*PEDIDO CONTACTO*/
Route::get('/admin/pedido_contacto', [AdminPedidoContactoController::class, 'pedido_contacto'])->middleware('auth');
Route::get('/admin/editar_pedido_contacto/{id}', [AdminPedidoContactoController::class, 'editar_pedido_contacto'])->middleware('auth');
Route::put('/admin/atualizar_pedido_contacto/{id}', [AdminPedidoContactoController::class, 'atualizar_pedido_contacto'])->middleware('auth');
Route::delete('/admin/pedido_contacto/{id}', [AdminPedidoContactoController::class, 'apagar_pedido_contacto'])->middleware('auth');

/*ÁREA DE INTERESSE*/
Route::get('/admin/area_interesse', [AdminInteresseController::class, 'area_interesse'])->middleware('auth');
Route::get('/admin/criar_area_interesse', [AdminInteresseController::class, 'criar_area_interesse'])->middleware('auth');
Route::post('/admin/area_interesse', [AdminInteresseController::class, 'store'])->middleware('auth');
Route::get('/admin/editar_area_interesse/{id}', [AdminInteresseController::class, 'editar_area_interesse'])->middleware('auth');
Route::put('/admin/atualizar_area_interesse/{id}', [AdminInteresseController::class, 'atualizar_area_interesse'])->middleware('auth');
Route::delete('/admin/area_interesse/{id}', [AdminInteresseController::class, 'apagar_area_interesse'])->middleware('auth');

/*MENTORES*/
Route::get('/admin/mentores', [UsersController::class, 'mentores'])->middleware('auth');
Route::get('/admin/criar_mentores', [UsersController::class, 'criar_mentores'])->middleware('auth');
Route::post('/admin/mentores/', [UsersController::class, 'store'])->middleware('auth');
Route::get('/admin/editar_mentores/{id}', [UsersController::class, 'editar_mentores'])->middleware('auth');
Route::put('/admin/atualizar_mentores/{id}', [UsersController::class, 'atualizar_mentores'])->middleware('auth');
Route::delete('/admin/mentores/{id}', [UsersController::class, 'apagar_mentores'])->middleware('auth');


Route::middleware(['auth:sanctum', 'verified'])->get('/admin', function () {
    return view('/admin/admin');
})->name('admin');


