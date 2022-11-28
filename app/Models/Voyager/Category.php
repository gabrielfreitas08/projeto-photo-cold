<?php

namespace App\Models\Voyager;

class Category extends \TCG\Voyager\Models\Category
{
    protected $table = 'categories';
    /**
     * Relacionamento Um para Muitos (tem muitos)
     */
    public function postagens()
    {
        return $this->hasMany(Post::class,'category_id','id')->orderBy('created_at', 'DESC');
    }
}
