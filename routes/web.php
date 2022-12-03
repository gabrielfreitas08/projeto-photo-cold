<?php

use Illuminate\Support\Facades\Auth;
use App\Models\{Fotografo, User, Evento, Foto};
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

    $fotografos = Fotografo::find($id);
    return view('fotografo.perfil',compact('fotografos'));
})->name('fotografos.show');


// Rota para enviar e-mail para o cliente
Route::get('/mail/{id}', function ($id){

    $tipoUsuarioLogado = Auth::user()->role()->first();

    // autorização para verificar o tipo de usuario
    if ($tipoUsuarioLogado->name != 'admin' and $tipoUsuarioLogado->name != 'fotografo'){
        return redirect()->route('eventos');
    }
    $pedido =  \App\Models\Pedido::find($id);

    //return new \App\Mail\UserEmail($user, $fotos);
     \Illuminate\Support\Facades\Mail::send(new \App\Mail\UserEmail($pedido));
     return back();
})->name('mail');


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/eventos',[\App\Http\Controllers\EventoController::class, 'index'])->name('eventos');
Route::get('/fotografos', [\App\Http\Controllers\FotografoController::class, 'index'])->name('fotografos');
Route::get('/pedido/{id}/pagamento', [\App\Http\Controllers\PedidoController::class, 'index'])->name('pagamento.index');

Route::middleware(['auth'])->group(function () {
    Route::post('/carrinho', [\App\Http\Controllers\CarrinhoController::class, 'store'])->name('carrinho.store');
});
