<?php

namespace App\Http\Controllers;
use App\Produse;
use App\Imagini;
use App\Categorii;
use App\Comenzi;
use App\Comenzi_produse;

use Session;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addToCart(Request $request, $id)
    {
        $produs = Produse::find($id);
        $imagine = Imagini::where('id_produs_imagine', $id)->first();
 
        if(!$produs) {
 
            abort(404);
 
        }
 
        // $cart = session()->get('cart');
        // $idRand = rand (0, 1000);
        
 
        // if cart is empty then this the first product
        // if(!$cart) {
 
            $prodpush = [
                "id" => $id,
                "marime" => $request->marime,
                "cantitate" => $request->cantitate,
                "imagine" => "/storage/images/" . $imagine->folder_imagine . "/" .$imagine->nume_imagine,
                "pret" => $produs->pret_produs,
                "denumire" => $produs->nume_produs            
            ];
        
 
            session()->push('cart', $prodpush);
            //return dd(session('cart'));
            return redirect()->back()->with('success', 'Produs adaugat cu succes!');

        // }       
 
        // if item not exist in cart then add to cart with quantity = 1
        // $cart[rand (0, 1000)] = [
            
        //                 "id" => $id,
        //                 "marime" => $request->marime,
        //                 "cantitate" => $request->cantitate,
        //                 "imagine" => "/storage/images/" . $imagine->folder_imagine . "/" .$imagine->nume_imagine,
        //                 "pret" => $produs->pret_produs,
        //                 "denumire" => $produs->nume_produs
            
        // ];
 
        // session()->push('cart', $cart);
        // return redirect()->back()->with('success', 'Produs adaugat cu succes');
    }



    public function delFromCart($id)
    {
        $cart = Session::get('cart'); // Get the array
        unset($cart[$id]); // Unset the index you want
        Session::put('cart', $cart); // Set the array again
    
    }

    public function checkout()
    {
        return view('shop.checkout');
    }

    public function finalizare(Request $request)
    {
        $request->validate([
            'nume'=>'required',
            'prenume'=>'required',
            'adresa'=> 'required',
            'localitate'=> 'required',
            'judet'=> 'required',
            'telefon'=> 'required',
            'email'=> 'required|email'            
          ]);
        
        $comanda = new Comenzi;
        $comanda->nume_comanda = $request->nume;
        $comanda->prenume_comanda = $request->prenume;
        $comanda->adresa_comanda = $request->adresa;
        $comanda->localitate_comanda = $request->localitate;
        $comanda->judet_comanda = $request->judet;
        $comanda->telefon_comanda = $request->telefon;
        $comanda->email_comanda = $request->email;

        if ($comanda->save()) {            
        
            $last_id = $comanda->id;
            $products = session('cart');
            
            foreach ($products as $product) {
                        
                $comenzi_produse = new Comenzi_produse;
                $comenzi_produse->id_comanda = $last_id;
                $comenzi_produse->id_produs = $product['id'];
                $comenzi_produse->marime = $product['marime'];
                $comenzi_produse->cantitate = $product['cantitate'];
                $comenzi_produse->pret = $product['pret'];

                $comenzi_produse->save();
                session::forget('cart');
            }
        }
       
        return view('shop.final-comanda', compact('last_id'));
    }
}