<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categorii;
use App\Produse;
use App\Imagini;


class CategorieController extends Controller
{

    public function cat($id)
    {
        
        $produse = Produse::where(['id_categorie_produs', $id], ['stare_produs', 'activ'])->with('categorii', 'imagini')->paginate(9);
        $categorii = Categorii::All();
        $options = array('noi' => 'Noi', 'ieftine' => 'Ieftine', 'scumpe' => 'Scumpe');
        $select = 'noi';

        return view('shop.shopbycat', compact('produse', 'categorii', 'options', 'select'));
        //return dd($produse);
    }


    public function sort($id, $sort)
    {   if ($sort == 'noi') {
        $produse = Produse::where(['id_categorie_produs', $id], ['stare_produs', 'activ'])->with('categorii', 'imagini')->orderBy('updated_at')->paginate(9);
        $categorii = Categorii::All();
        $select = $sort;
        $options = array('noi' => 'Noi', 'ieftine' => 'Ieftine', 'scumpe' => 'Scumpe');
    
        return view('shop.shopbycat', compact('produse', 'categorii', 'select', 'options'));
    
        } elseif ($sort == 'ieftine') {
            $produse = Produse::where(['id_categorie_produs', $id], ['stare_produs', 'activ'])->with('categorii', 'imagini')->orderBy('pret_produs')->paginate(9);
            $categorii = Categorii::All();
            $select = $sort;
            $options = array('noi' => 'Noi', 'ieftine' => 'Ieftine', 'scumpe' => 'Scumpe');
        
            return view('shop.shopbycat', compact('produse', 'categorii', 'select', 'options'));
        
        } elseif ($sort == 'scumpe') {
            $produse = Produse::where(['id_categorie_produs', $id], ['stare_produs', 'activ'])->with('categorii', 'imagini')->orderBy('pret_produs', 'desc')->paginate(9);
            $categorii = Categorii::All();
            $select = $sort;
            $options = array('noi' => 'Noi', 'ieftine' => 'Ieftine', 'scumpe' => 'Scumpe');
        
            return view('shop.shopbycat', compact('produse', 'categorii', 'select', 'options'));
        } else {
            $produse = Produse::where(['id_categorie_produs', $id], ['stare_produs', 'activ'])->with('categorii', 'imagini')->orderBy('updated_at')->paginate(9);
            $categorii = Categorii::All();
            $select = 'noi';
            $options = array('noi' => 'Noi', 'ieftine' => 'Ieftine', 'scumpe' => 'Scumpe');
    
            return view('shop.shopbycat', compact('produse', 'categorii', 'select', 'options'));
        }
        
        
        
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function show(Categorie $categorie)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function edit(Categorie $categorie)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Categorie $categorie)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Categorie $categorie)
    {
        //
    }
}
