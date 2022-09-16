<?php

namespace App\Models;
use TCG\Voyager\Facades\Voyager;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;


class Evento extends Model
{
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
        if($user->hasRole('admin')){
            return $query;
        }
        return $query->where('user_id', $user->getKey());
    }

    public function capa()
    {
        /*dd($this->capa_id);*/
        return $this->hasOne(Foto::class,'id', 'capa_id');
    }

    public function fotos()
    {
        /*dd($this->capa_id);*/
        return $this->hasMany(Foto::class,'evento_id', 'id');
    }
}
