<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return redirect()->route('voyager.dashboard');
        //return view('home');
    }

    // função para visualização da imagem detalhada (ampliada)
    /*function foto ($id = null){

        if (!empty($id)){
            $registro = Foto::where([
                'id' => $id,
            ])->first();
        }

        if (!empty($registro)){
            return view('evento.foto', compact('registro'));
        }
        return redirect()->route('evento');
    }*/
}
