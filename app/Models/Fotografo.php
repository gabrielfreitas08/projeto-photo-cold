<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;


class Fotografo extends Model
{

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

    public function scopeActive($query)
    {
        $user = Auth::user();
        if ($user->hasRole('admin')) {
            return $query;
        }
        return $query->where('user_id', $user->getKey());
    }


}
