<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PedidoController extends Controller
{
    public function index($id, Request $request){

        $tipoUsuarioLogado = Auth::user()->role()->first();

        // autorização para verificar o tipo de usuario
        if ($tipoUsuarioLogado->name != 'admin' and $tipoUsuarioLogado->name != 'fotografo'){
            return redirect()->route('eventos');
        }

        $pedido = Pedido::find($id);
        $pedido->status = Pedido::PAGO;
        $pedido->save();
        // falta enviar o email

        return redirect()->route('mail', ['id'=>$pedido->id]);
    }
}
