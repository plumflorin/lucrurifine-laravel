<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class comenzi_produse extends Model
{
    protected $table = 'comenzi_produse';
    public $timestamps = false;

    public function comenzi()
    {
        return $this->belongsTo('App\Comenzi', 'id_comanda');
    }

    public function produse()
    {
        return $this->belongsTo('App\Produse', 'id_produs');
    }
}
