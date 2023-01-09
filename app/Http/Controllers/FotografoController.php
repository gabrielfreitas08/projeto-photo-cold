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
        // Define o tipo de função do usuário
        $tipoUsuario = Role::where('name', '=', 'fotografo')->first();

        // Verifica se o fotógrafo está ativo e com função de fotógrafo
        $fotografos = Fotografo::where([
            'status' => Fotografo::ATIVO
        ])->whereRelation('user', 'role_id', $tipoUsuario->id)->get();

        $estados = Estado::all();
        $cidades = Cidade::all();

        //$estados = Estado::where('id', '=', "{$request->filtro}")->get();
        //$cidades = Cidade::where('id', '=', "{$request->filtro}")->get();

        return view('fotografo.fotografo', compact('fotografos', 'estados', 'cidades'));

    }

    // busca um único fotógrafo
    public function show(){

    }

    public function userUpgrade(Request $request, $id)
    {
        $user = Auth::user();
        //dd($request->email);

        //$role = Role::where('name', '=', 'fotografo')->first();


        $fotografo = new Fotografo();
        $fotografo->emial_profissional = $request->input('email');
        $fotografo->whatsapp = $request->input('whatsapp');
        $fotografo->instagram = $request->input('instagram');
        $fotografo->biografia = ' ';
        $fotografo->user_id = $user->id;
        $fotografo->status = Fotografo::INATIVO;
        $fotografo->save();

        return redirect(route('fotografos'));
    }

    public function ativar($id, Request $request){

        // Verifica qual é a função do usuário que está logado
        $tipoUsuarioLogado = Auth::user()->role()->first();

        // autorização para verificar o tipo de usuário que pode modificar
        if ($tipoUsuarioLogado->name != 'admin'){
            return redirect()->route('fotografos');
        }

        // Identifica o fotógrafo
        $fotografo = Fotografo::find($id);
        $fotografo->status = Fotografo::ATIVO; // altera o status de inativo para ativo
        $fotografo->save(); // salva a modificação
        // Realiza troca do papel de usuario comum para fotógrafo
        $role = Role::where('name','LIKE','fotografo')->first();
        $user = User::find($fotografo->user_id);
        $user->role_id = $role->id;
        $user->save();

        return redirect()->back();
    }


}
