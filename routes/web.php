<?php

use Illuminate\Support\Facades\Auth;
use App\Models\{Fotografo, User, Evento, Foto, Pedido, Estado};
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
})->name('home');


// Rota das fotos
Route::get('/fotos/{id}', function ($id) {

    $evento = Evento::find($id);
    /*$fotos = Foto::all();*/
    return view('evento.foto', compact('evento'));
})->name('fotos.show');


// Rota para visualizar todas as fotos
Route::get('/fotos', function () {
    /* dd($id);
    $evento = Evento::find($id);*/
    $fotos = Foto::all();
    return view('evento.foto', compact('fotos'));
})->name('fotos');


// Rota de visualização dos eventos
Route::get('/eventos/{id}', function ($id)  {

    $eventos = Evento::find($id);
    return view('evento.show',compact('eventos'));
})->name('eventos.show');


// Rota de visualização dos perfis dos fotografos
Route::get('/fotografos/{id}', function ($id)  {

    $fotografo = Fotografo::find($id);
    $trabalhos = json_decode($fotografo?->fotos_trabalho);
    return view('fotografo.perfil',compact('fotografo', 'trabalhos'));
})->name('fotografos.show');


// Rota para enviar e-mail para o cliente
Route::get('/mail/{id}', function ($id){

    $tipoUsuarioLogado = Auth::user()->role()->first();

    // autorização para verificar o tipo de usuario
    if ($tipoUsuarioLogado->name != 'admin' and $tipoUsuarioLogado->name != 'fotografo'){
        return redirect()->route('eventos');
    }
    $pedido =  Pedido::find($id);

    //return new \App\Mail\UserEmail($user, $fotos);
     \Illuminate\Support\Facades\Mail::send(new \App\Mail\UserEmail($pedido));
     return back();
})->name('mail');

// rota de visualização dos itens do pedido
Route::get('/pedido/{id}/view', function ($id)  {

    $pedido = Pedido::find($id);

    return view('pedido.show',compact('pedido'));
})->name('pedido.show');

// rota de visualização dos meio de pagamento (como pagar)
Route::get('/pedido/{id}/view/pagamento', function ($id)  {

    $pedido = Pedido::find($id);
    $usuario_fotografo = $pedido->fotos()->first()->evento()->first()->user()->first();
    //dd($usuario_fotografo);
    $fotografo = Fotografo::where('user_id', $usuario_fotografo->id)->first();

    return view('pedido.pagamento',compact('pedido', 'fotografo'));
})->name('pedido.pagamento');

//
Route::get('/user/solicitacao', function (){

    $user = Auth::user()->first();
    $estados = Estado::all();

    return view('fotografo.upgrade',compact('user', 'estados'));
})->name('solicitacao');


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/eventos',[\App\Http\Controllers\EventoController::class, 'index'])->name('eventos');
Route::get('/fotografos', [\App\Http\Controllers\FotografoController::class, 'index'])->name('fotografos');


Route::middleware(['auth'])->group(function () {
    Route::post('/carrinho', [\App\Http\Controllers\CarrinhoController::class, 'store'])->name('carrinho.store');
    Route::get('/pedido/{id}/pagamento', [\App\Http\Controllers\PedidoController::class, 'index'])->name('pagamento.index');
    Route::get('/meuspedidos', [\App\Http\Controllers\PedidoController::class, 'pedidocliente'])->name('pedidocliente');
    Route::get('/fotografos/{id}/ativar', [\App\Http\Controllers\FotografoController::class, 'ativar'])->name('fotografo.ativar');
    Route::post('/pedido/{id}/informar_pagamento', [\App\Http\Controllers\PedidoController::class, 'informarPagamento'])->name('pedido.informar_pagamento');
    Route::post('/fotografos/{id}/fotografo', [\App\Http\Controllers\FotografoController::class, 'userUpgrade'])->name('fotografo.upgrade');
});
