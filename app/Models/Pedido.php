<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;


class Pedido extends Model
{
    public const AGUARDANDO_PAGAMENTO = 2;
    public const PAGO = 3;

    public function fotos(){
        return $this->belongsToMany(Foto::class, 'itens_pedidos');
    }

    public function scopeUsuario($query)
    {
        $user = Auth::user();
        if ($user->hasRole('admin')) {
            return $query;
        }
        return $query->where('user_id', $user->getKey());
    }

}
