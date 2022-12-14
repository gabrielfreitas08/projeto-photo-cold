<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class PedidoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($id, Request $request){

        $tipoUsuarioLogado = Auth::user()->role()->first();

        // autorização para verificar o tipo de usuario
        if ($tipoUsuarioLogado->name != 'admin' and $tipoUsuarioLogado->name != 'fotografo'){
            return redirect()->route('eventos');
        }

        $pedido = Pedido::find($id);
        $pedido->status = Pedido::PAGAMENTO_CONFIRMADO;
        $pedido->save();
        // falta enviar o email

        return redirect()->route('mail', ['id'=>$pedido->id]);
    }

    public function pedidocliente(Request $request ){

        $user = Auth::user();

        $pedidos = Pedido::where('user_id',$user->id)->orderBy('id', 'DESC')->get();

        return view('pedido.index', compact('pedidos'));

    }

    public function informarPagamento($id, Request $request){

        $pedido = Pedido::find($id);
        //dd($request->comprovante);
        $pedido->status = Pedido::PAGAMENTO_INFORMADO;
        if (isset($request->comprovante)) {
            $pedido->comprovante =
                $request->file('comprovante')->store('comprovantes/'.$id, 'public');
        }
        $pedido->save();

        return redirect()->route('pedidocliente');

    }
}
