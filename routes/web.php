<?php

use App\Models\{
    User,
    Evento,
    Foto,
    };
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


// Rota da classe Evento
/*
Route::get('/eventos', function () {

    $eventos = Evento::where([
        'status' => 'on' // é para retornar eventos públicos
    ]);
    return view('evento.index', compact('eventos'));
})->name('eventos');*/


// Rota das fotos
Route::get('/fotos/{id}', function ($id) {

    $evento = Evento::find($id);
    /*$fotos = Foto::all();*/
    return view('evento.foto', compact('evento'));
})->name('fotos.show');


// Rota de ver fotos
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


// rota para adcionar a foto do evento no carrinho
/*Route::get('/carrinho', function () {

    $info = Evento::first();
    $carrinho = Foto::first();
    return view('carrinho.index', compact('carrinho', 'info'));
    //return redirect('eventos.show', compact('carrinho'));
})->name('carrinho');*/


// rota para finalizar a compra do carrinhp
/*Route::get('/carrinho/final', function () {

    $fotos = Foto::find();
    return view('carrinho.finalizacao', compact('fotos'));
})->name('carrinho.finalizacao');*/


// Rota de visualização dos perfis dos fotografos
Route::get('/fotografos/{id}', function ($id)  {

    $fotografos = \App\Models\Fotografo::find($id);
    return view('fotografo.perfil',compact('fotografos'));
})->name('fotografos.show');

// Rota para enviar e-mail para o cliente
Route::get('/mail/{id}', function ($id){

    $user =  User::find($id);

    $fotos = Foto::take(10)->get();

    //return new \App\Mail\UserEmail($user, $fotos);
     \Illuminate\Support\Facades\Mail::send(new \App\Mail\UserEmail($user, $fotos));
})->name('mail');

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/eventos',[\App\Http\Controllers\EventoController::class, 'index'])->name('eventos');
Route::get('/fotografos', [\App\Http\Controllers\FotografoController::class, 'index'])->name('fotografos');

Route::middleware(['auth'])->group(function () {
    Route::post('/carrinho', [\App\Http\Controllers\CarrinhoController::class, 'store'])->name('carrinho.store');
});
