<?php

namespace App\Http\Controllers;

use App\Models\Cidade;
use App\Models\Estado;
use App\Models\Fotografo;
use App\Models\User;
use Illuminate\Http\Request;
use TCG\Voyager\Models\Role;

class FotografoController extends Controller
{
    public function index(Request $request)
    {

        $tipoUsuario = Role::where('name', '=', 'fotografo')->first();

        $fotografos = Fotografo::where([
            'status' => Fotografo::ATIVO
        ])->whereRelation('user', 'role_id', $tipoUsuario->id)->get();

        $estados = Estado::all();
        $cidades = Cidade::all();

        //$estados = Estado::where('id', '=', "{$request->filtro}")->get();
        //$cidades = Cidade::where('id', '=', "{$request->filtro}")->get();

        return view('fotografo.fotografo', compact('fotografos', 'estados', 'cidades'));

    }

    public function trabalhos($id){

        $fotografo = Fotografo::find($id);
        $trabalhos = json_decode($fotografo?->fotos_trabalho);

        return view('fotografo.trabalho', compact('fotografo', 'trabalhos'));

    }


}
