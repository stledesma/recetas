<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Perfil extends Model
{
    //Relacion inversa 1 a 1
    public function perfilUser(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
