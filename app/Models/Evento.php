<?php

namespace App\Models;

use http\Env\Request;
use TCG\Voyager\Facades\Voyager;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;


class Evento extends Model
{
    public const PUBLICO = 1;

    /**
     * Prepare a date for array / JSON serialization.
     *
     * @param  \DateTimeInterface  $date
     * @return string
     */
    /*protected function serializeDate(\DateTimeInterface $date)
    {
        return $date->format('d/m/Y');
    }*/

    protected $dates = [
        'dia_realizado',
        'created_at',
        'updated_at',
    ];


    public function save(array $options = [])
    {
        // If no author has been assigned, assign the current user's id as the author of the post
        if (!$this->user_id && Auth::user()) {
            $this->user_id = Auth::user()->getKey();
        }
        return parent::save();
    }

    public function scopeUsuario($query)
    {
        $user = Auth::user();
        if ($user->hasRole('admin')) {
            return $query;
        }
        return $query->where('user_id', $user->getKey());
    }

    public function capa()
    {
        return $this->hasOne(Foto::class, 'id', 'capa_id');
    }

    public function fotos()
    {
        return $this->hasMany(Foto::class, 'evento_id', 'id');
    }

    public function cidade(){
        return $this->belongsTo(Cidade::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function getValorFormtadoReal(){

        return 'R$ '.number_format($this->valor, 2, ',', '.');
    }

}
