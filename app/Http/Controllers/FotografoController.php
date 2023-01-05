<?php

namespace App\Http\Controllers;

use App\Models\Cidade;
use App\Models\Estado;
use App\Models\Fotografo;
use App\Models\Pedido;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

    public function update(Request $request, $id)
    {

    }

    public function ativar($id, Request $request){

        $tipoUsuarioLogado = Auth::user()->role()->first();

        // autorização para verificar o tipo de usuario
        if ($tipoUsuarioLogado->name != 'admin'){
            return redirect()->route('fotografos');
        }

        $fotografo = Fotografo::find($id);
        $fotografo->status = Fotografo::ATIVO;
        $fotografo->save();

        return redirect()->back();
    }


}
