<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class ItensPedido extends Model
{
    public function pedido(){
        return $this->belongsTo(Pedido::class);
    }

    public function fotos(){
        return $this->belongsTo(Foto::class);
    }
}
