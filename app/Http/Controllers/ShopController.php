<?php

namespace App\Http\Controllers;

use App\Produse;
use App\Imagini;
use App\Categorii;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Builder;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produse = Produse::with('categorii', 'imagini')->paginate(9);
        $categorii = Categorii::All();
        $options = array('noi' => 'Cele Mai Noi', 'crescator' => 'Pret Crescator', 'descrescator' => 'Pret Descrescator');
        $select = 'noi';

        return view('shop.shop', compact('produse', 'categorii', 'options', 'select'));
        //return dd($produse);
        
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function sort($sort)
    {   if ($sort == 'noi') {
        $produse = Produse::with('categorii', 'imagini')->orderBy('updated_at')->paginate(9);
        $categorii = Categorii::All();
        $select = $sort;
        $options = array('noi' => 'Cele Mai Noi', 'crescator' => 'Pret Crescator', 'descrescator' => 'Pret Descrescator');
    
        return view('shop.shop', compact('produse', 'categorii', 'select', 'options'));
    
        } elseif ($sort == 'crescator') {
            $produse = Produse::with('categorii', 'imagini')->orderBy('pret_produs')->paginate(9);
            $categorii = Categorii::All();
            $select = $sort;
            $options = array('noi' => 'Cele Mai Noi', 'crescator' => 'Pret Crescator', 'descrescator' => 'Pret Descrescator');
        
            return view('shop.shop', compact('produse', 'categorii', 'select', 'options'));
        
        } elseif ($sort == 'descrescator') {
            $produse = Produse::with('categorii', 'imagini')->orderBy('pret_produs', 'desc')->paginate(9);
            $categorii = Categorii::All();
            $select = $sort;
            $options = array('noi' => 'Cele Mai Noi', 'crescator' => 'Pret Crescator', 'descrescator' => 'Pret Descrescator');
        
            return view('shop.shop', compact('produse', 'categorii', 'select', 'options'));
        } else {
            $produse = Produse::with('categorii', 'imagini')->orderBy('updated_at')->paginate(9);
            $categorii = Categorii::All();
            $select = 'noi';
            $options = array('noi' => 'Cele Mai Noi', 'crescator' => 'Pret Crescator', 'descrescator' => 'Pret Descrescator');
    
            return view('shop.shop', compact('produse', 'categorii', 'select', 'options'));
        }
        
        
        
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
     * @param  \App\Shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function show(Shop $shop)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function edit(Shop $shop)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Shop $shop)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function destroy(Shop $shop)
    {
        //
    }
}
