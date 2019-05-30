<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produse extends Model
{
    protected $table = 'produse';

    protected $fillable = ['nume_produs', 
    'descriere_produs', 
    'pret_produs', 
    'pret_vechi_produs', 
    'id_categorie_produs'
    ];

    public function imagini()
    {
        return $this->hasMany('App\Imagini', 'id_produs_imagine');
    }

    public function categorii()
    {
        return $this->belongsTo('App\Categorii', 'id_categorie_produs');
    }

    public function comenzi_produse()
    {
        return $this->hasMany('App\Comenzi_produse', 'id_produs');
    }
}
