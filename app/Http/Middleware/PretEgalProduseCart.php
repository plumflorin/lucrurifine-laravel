<?php

namespace App\Http\Middleware;

use Closure;
use Session;
use App\Produse;

class PretEgalProduseCart
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $cartItems = Session::get('cart');
        $pretmodif = "false";
        foreach ($cartItems as $key => $cartItem) {
            $produs = Produse::where('id', $cartItem['id'])->first();
            if ($cartItem['pret'] != $produs->pret_produs) {
                $id = $key;
                unset($cartItems[$key]);
                $pretmodif = "true";
            }            
        }
        if ($pretmodif == 'true') {            
        
        Session::put('cart', $cartItems);
        return redirect()->back()->with('pretegalprod', 'Pretul a suferit modificari pentru unul sau mai multe produse iar acestea au fost eliminate din cosul dumneavoastra de cumparaturi. Va rugam sa revedeti cosul!');  
    } else {
        return $next($request);
    }
    }
}
