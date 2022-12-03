<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use TCG\Voyager\Traits\Resizable;


class Foto extends Model
{
    use Resizable;



    public function evento(){
        return $this->belongsTo(Evento::class);
    }
}
