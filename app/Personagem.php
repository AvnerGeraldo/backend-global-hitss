<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Personagem extends Model
{
    protected $table = "personagem";

    public function arma()
    {
        return $this->hasOne('App\Arma', 'id', 'id_arma');
    }
}
