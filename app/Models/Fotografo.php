<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;


class Fotografo extends Model
{
    public const ATIVO = 2;
    public const INATIVO = 1;


    /*
     * Função para verificar se o usuário Fotógrafo possui todos os dados, se não possuir, mostrar apenas os dados recebidos
     */

    function information() {

        $this->middleware('VerifyCsrfToken');

        $dados = Fotografo::only([
            'whatsapp',
            'facebook',
            'instagram',
            'site',
            'emial_profissional'
        ]);
        // usar empty ou isset?
        if (isset($dados)){
            return view()->route('fotografo.show');
        }
    }

    public function scopeUsuario($query)
    {
        $user = Auth::user();
        if ($user->hasRole('admin')) {
            return $query;
        }
        return $query->where('user_id', $user->getKey());
    }

    public function user(){

        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function cidade(){

        return $this->belongsTo(Cidade::class);
    }

}
