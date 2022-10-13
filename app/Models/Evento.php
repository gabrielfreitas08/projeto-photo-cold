<?php

namespace App\Models;

use http\Env\Request;
use TCG\Voyager\Facades\Voyager;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;


class Evento extends Model
{

    /**
     * Prepare a date for array / JSON serialization.
     *
     * @param  \DateTimeInterface  $date
     * @return string
     */
    /*protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('d-m-Y');
    }*/


    public function save(array $options = [])
    {
        // If no author has been assigned, assign the current user's id as the author of the post
        if (!$this->user_id && Auth::user()) {
            $this->user_id = Auth::user()->getKey();
        }
        return parent::save();
    }

    public function scopeActive($query)
    {
        $user = Auth::user();
        if ($user->hasRole('admin')) {
            return $query;
        }
        return $query->where('user_id', $user->getKey());
    }

    public function capa()
    {
        /*dd($this->capa_id);*/
        return $this->hasOne(Foto::class, 'id', 'capa_id');
    }

    public function fotos()
    {
        return $this->hasMany(Foto::class, 'evento_id', 'id');
    }

    /*public function add ()
    {

        $this->middleware('VerifyCsrfToken');

        $req = Request();
        $foto = $req->input('id');

        $produto = Foto::find($foto);
        if (empty($produto->id)){
            $req->session()->flash('mensagem-falha', 'foto não encrontrada');
            return redirect()->route('eventos.show');
        }

        $user = Auth::id();

        $foto = Pedido::consulta([
           'user_id' => $user,
            'status' => 'RE' // reservada
        ]);

    }*/

}
