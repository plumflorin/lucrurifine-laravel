<?php

namespace App\Http\Controllers;

use App\Produse;
use App\Imagini;
use App\Categorii;
use App\Comenzi;
use App\Comenzi_produse;
use Session;
use Auth;
use Illuminate\Http\Request;

class ComenziController extends Controller
{
   
    public function index()
    {
        $comenzi = Comenzi::OrderBy('id', 'desc')->with('produse')->get();
        return view('admin.comenzi', compact('comenzi'));
        // return dd($comenzi);
    }

    public function show($id)
    {
        $comanda = Comenzi::with('produse', 'imagini')->find($id);
        
        // return dd($comanda);
        return view('admin.comanda', compact('comanda'));
    }

    public function status($id)
    {        
        $comanda = Comenzi::find($id);

        if ($comanda->stare_comanda == 'nepreluata') {
            $comanda->stare_comanda = 'in asteptare';
            $comanda->save();
        } elseif ($comanda->stare_comanda == 'in asteptare') {
            $comanda->stare_comanda = 'finalizata';
            $comanda->save();        
        } elseif ($comanda->stare_comanda == 'finalizata') {
            $comanda->stare_comanda = 'anulata';
            $comanda->save();
        } elseif ($comanda->stare_comanda == 'anulata') {
            $comanda->stare_comanda = 'nepreluata';
            $comanda->save();            
        }
        
    }

    public function dashboard()
    {
        $produse = Produse::count();
        $categorii = Categorii::count();
        $comenzi_in_asteptare = Comenzi::where('stare_comanda','in asteptare')->orWhere('stare_comanda','nepreluata')->count();
        $comenzi_finalizate = Comenzi::where('stare_comanda','finalizata')->count();
        
        return view('admin.dashboard', compact('produse', 'categorii', 'comenzi_in_asteptare', 'comenzi_finalizate'));
        // dd($comenzi_in_asteptare);
    }

    public function logout()
    {

    Auth::logout();
    return redirect('/shop');

    }
}
