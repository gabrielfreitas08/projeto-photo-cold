<?php

use App\Models\{
    User,
    Preferences,
    Evento,
    Foto,
    View,
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
});


// Rota da classe Evento
Route::get('/evento', function () {

    $eventos = Evento::all();
    return view('evento.index', compact('eventos'));
})->name('evento');

// Rota das fotos
Route::get('/fotos/{id}', function ($id) {

   /* dd($id);*/
    $evento = Evento::find($id);
    /*$fotos = Foto::all();*/
    return view('evento.foto', compact('evento'));
})->name('fotos');

// Rota de ver fotos
Route::get('/verfotos', function () {

    /* dd($id);
    $evento = Evento::find($id);*/
    $fotos = Foto::all();
    return view('evento.foto', compact('fotos'));
})->name('verfotos');

// Rota de visualização dos eventos
Route::get('/view/{id}', function ($id)  {

    $evento = Evento::find($id);
    return view('evento.view',compact('evento'));
})->name('view');

// rota para adcionar a foto do evento no carrinho
Route::get('/carrinho/{id}', function ($id) {

    $select = Foto::find ($id);
    return view('evento.carrinho', compact('select'));
});

// rota para visualizar os fotografos cadastrados na plataforma
Route::get('/fotografo', function () {

    /*$fotografo = User::all();*/
   /* $fotografo = User::where ({{Voyager:roles("display_name = 'fotografo'")}});*/
    $fotografo = User::where ('role_id',3)->get();

    return view('evento.fotografo', compact('fotografo'));
});

// Rota de visualização dos perfis dos fotografos
Route::get('/perfil/{id}', function ($id)  {

    $perfil = User::find($id);
    return view('evento.perfil',compact('perfil'));
})->name('perfil');

Route::get ('/one-to-one', function() {

    $user = User::first();

    dd($user->Preferences );
});



Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
