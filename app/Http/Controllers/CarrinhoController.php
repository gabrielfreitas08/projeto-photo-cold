<?php

namespace App\Http\Controllers;

use App\Models\Foto;
use App\Models\ItensPedido;
use App\Models\Pedido;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CarrinhoController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function store(Request $request)
    {

        $pedidosPorFotografo = [];
        foreach ($request->fotos as $foto_id) {
            $foto = Foto::find($foto_id);
            $pedidosPorFotografo[$foto->evento()->first()->user()->first()->id][] = $foto;
        }

        foreach ($pedidosPorFotografo as $usuario_id => $fotos) {
            $pedido = new Pedido();
            $pedido->status = Pedido::AGUARDANDO_PAGAMENTO;
            $pedido->user_id = Auth::user()->id ?? 1;
            $fotografo = Fotografo::where('user_id', $usuario_id)->first();
            $pedido->fotografo_id = $fotografo->id;
            $pedido->valor_total = 0;
            $pedido->save();
            foreach($fotos as $foto){
                $itemPedido = new ItensPedido();
                $itemPedido->pedido_id = $pedido->id;
                $itemPedido->foto_id = $foto->id;
                $itemPedido->save();
                $pedido->valor_total += $itemPedido->foto()->first()->evento()->first()->valor;
            }
            $pedido->save();
        }
        return view('carrinho.index', compact('pedido', 'itemPedido'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
