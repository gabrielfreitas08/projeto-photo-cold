<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use Illuminate\Http\Request;

class EventoController extends Controller
{
    public function index()
    {
        return view('evento.index', ['eventos'=> Evento::where([
            'status' => Evento::PUBLICO
        ])->get()]);
    }
}
