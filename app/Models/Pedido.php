<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;


class Pedido extends Model
{
    public const AGUARDANDO_PAGAMENTO = 1;
    public const PAGAMENTO_INFORMADO = 2;
    public const PAGAMENTO_CONFIRMADO = 3;


    public function fotos(){
        return $this->belongsToMany(Foto::class, 'itens_pedidos');
    }

    public function user(){
        return $this->belongsToMany(User::class);
    }

    public function scopeUsuario($query)
    {
        $user = Auth::user();
        if ($user->hasRole('admin')) {
            return $query;
        }
        return $query->where('user_id', $user->getKey());
    }

    // criar metodo para retornar o texto do status

    public function getStatus(){

        if ($this->status == self::AGUARDANDO_PAGAMENTO){
            return '<span class="badge text-bg-light">Aguardando Pagamento</span>';
        }

        if ($this->status == self::PAGAMENTO_INFORMADO){
            return '<span class="badge text-bg-warning">Pagamento Informado</span>';
        }

        if ($this->status == self::PAGAMENTO_CONFIRMADO){
            return '<span class="badge text-bg-success">Pagamento Confirmado</span>';
        }
         return '';

    }

    public function getValorFormtadoReal(){

        return 'R$ '.number_format($this->valor_total, 2, ',', '.');
    }

}
