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

        $pedido = new Pedido();
        $pedido->status = Pedido::AGUARDANDO_PAGAMENTO;
        $pedido->user_id = Auth::user()->id ?? 1;
        $pedido->valor_total = 0;
        $pedido->save();


        foreach ($request->fotos as $id){
            $itemPedido = new ItensPedido();
            $itemPedido->pedido_id = $pedido->id;
            $itemPedido->foto_id = $id;
            $itemPedido->save();
            $pedido->valor_total += $itemPedido->foto()->first()->evento()->first()->valor;
        }
        $pedido->save();

        return view('carrinho.finalizacao', compact('pedido', 'itemPedido'));
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
