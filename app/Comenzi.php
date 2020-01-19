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

    public function produse()
    {
        return $this->belongsToMany('App\Produse', 'comenzi_produse', 'id_comanda', 'id_produs')
                    ->withPivot('marime', 'cantitate', 'pret');
    }

    public function imagini()
    {
        return $this->hasManyThrough('App\Imagini', 'App\Produse', 'id', 'id_produs_imagine', 'id', 'id');
    }

    
}
