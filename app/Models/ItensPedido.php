<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class ItensPedido extends Model
{
    protected $table = 'itens_pedidos';

    public function pedido(){
        return $this->belongsTo(Pedido::class);
    }

    public function foto(){
        return $this->belongsTo(Foto::class);
    }
}
