<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categorii extends Model
{
    protected $table = 'categorii';

    protected $fillable = ['nume_categorie'];


    public function produse()
    {
        return $this->hasMany('App\Produse', 'id_categorie_produs');
    }
}
