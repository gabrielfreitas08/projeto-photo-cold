<?php

namespace App\Http\Controllers;

use App\Models\Fotografo;
use App\Models\User;
use Illuminate\Http\Request;
use TCG\Voyager\Models\Role;

class FotografoController extends Controller
{
    public function index()
    {



        $funcao = Role::where([
            'name' => 'fotografo'
        ])->get();

        $user = User::where([
            'role_id' => $funcao->id
        ])->get();

        $ativo = Fotografo::where([
            'status' => 2
        ])->get();

        $fotografo = $funcao && $ativo ;

        if ($fotografo) {
            return view('fotografo.fotografo', ['fotografo' => User::find($fotografo)]);
        }

        /* return view('fotografo.fotografo', ['fotografo'=> User::where([
             //'status' => 2,
             'role_id' => 3
             // falta a opção de pegar a função fotografo de role
         ])->get()]);*/
    }


}
