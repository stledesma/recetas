<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Receta extends Model
{
    public function categoryReceta(){
        return $this->belongsTo(Category::class, 'category_id');
    }
}
