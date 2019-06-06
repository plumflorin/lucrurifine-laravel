<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class comenzi extends Model
{
    protected $table = 'comenzi';

    protected $fillable = [
                            'nume_comanda', 
                            'prenume_comanda', 
                            'adresa_comanda', 
                            'localitate_comanda', 
                            'judet_comanda',
                            'telefon_comanda',
                            'email_comanda'
                        ];

    public function comenzi_produse()
    {
        return $this->hasMany('App\Comenzi_produse', 'id_comanda');
    }

    
}
