<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Pedido extends Model
{
    public function fotos(){
        return $this->belongsTo(Foto::class);
    }


}
