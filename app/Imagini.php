<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Imagini extends Model
{
    protected $table = 'imagini';

    public function produse()
    {
        return $this->belongsTo('App\Produse', 'id_produs_imagine');
    }
}
