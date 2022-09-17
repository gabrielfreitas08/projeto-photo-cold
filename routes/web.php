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
Route::get('/eventos', function () {

    $eventos = Evento::all();
    return view('evento.index', compact('eventos'));
})->name('eventos');

// Rota das fotos
Route::get('/fotos/{id}', function ($id) {

   /* dd($id);*/
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

    $evento = Evento::find($id);
    return view('evento.show',compact('evento'));
})->name('eventos.show');

// rota para adcionar a foto do evento no carrinho
Route::get('/carrinho', function () {

    return view('carrinho.index');
})->name('carrinho');

// rota para visualizar os fotografos cadastrados na plataforma
Route::get('/fotografos', function () {

    $fotografo = User::where ('role_id',3)->get();
   return view('fotografo.fotografo', compact('fotografo'));
})->name('fotografos');

// Rota de visualização dos perfis dos fotografos
Route::get('/fotografos/{id}', function ($id)  {

    $perfil = User::find($id);
    return view('fotografo.perfil',compact('perfil'));
})->name('fotografos.show');

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
