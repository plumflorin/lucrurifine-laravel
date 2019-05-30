@extends('layouts.app')


@section('content')



<!-- ##### Checkout Area Start ##### -->
<div class="checkout_area section-padding-80">
        <div class="container">        
            <div class="row">
                <div class="col-12 col-md-6 col-lg-5 ml-lg-auto">
                    <div class="order-details-confirmation">

                        <div class="cart-page-heading">
                            <h5>Comanda Dumneavoastra</h5>                            
                        </div>

                        <?php 
                                $subtotal = 0;
                                $livrare = 0;                            

                                if(session()->has('cart')):
                                    foreach(Session('cart') as $detaliiCart):

                                    $subtotal = $subtotal + ($detaliiCart['pret'] * $detaliiCart['cantitate']);

                                    endforeach;                                    
                                endif;
                         ?>

                        <ul class="order-details-form mb-4">
                            <li><span>Subtotal</span> <span>{{$subtotal}} LEI</span></li>
                            <li><span>Livrare</span> <span>

                            <?php
                                if(Session('cart')) {
                                    if($subtotal > 200) {
                                        $livrare = 0;
                                        echo $livrare . ' LEI';
                                    } else {   
                                        $livrare = 17  ;                  
                                        echo $livrare . ' LEI';
                                    }
                                
                                }  else {
                                    $livrare = 0;
                                    echo $livrare . ' LEI';
                                }
                            ?>

                            </span></li>
                            <li><span>Total</span> <span>
                            
                            <?php
                                if ($subtotal > 0) {                      
                                    echo $subtotal + $livrare . " LEI";                                
                                } else {
                                echo 0 . " Lei";
                                }
                            ?>
                            
                            
                            </span></li>
                        </ul>
                        <h5> Optiune plata: Plata ramburs </h5>
                    </div>
                    @if($errors->any())
                        <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                        </div><br />
                    @endif
                </div>
                <div class="col-12 col-md-6">
                
                    <div class="checkout_details_area  clearfix">
                    
                        <div class="cart-page-heading mb-30">
                            <h5>Adresa de livrare</h5>
                        </div>
                        
                        <form action="/final-comanda" method="post" id="finalcomanda">
                        <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="first_name">Nume <span>*</span></label>
                                    <input type="text" class="form-control" name="nume" value="{{ old('nume') }}" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="last_name">Prenume <span>*</span></label>
                                    <input type="text" class="form-control" name="prenume" value="{{ old('prenume') }}" required>
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="company">Adresa Livrare <span>*</span></label>
                                    <input type="text" class="form-control" name="adresa" value="{{ old('adresa') }}" required>
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="company">Localitate <span>*</span></label>
                                    <input type="text" class="form-control" name="localitate" value="{{ old('localitate') }}" required>
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="company">Judet <span>*</span></label>
                                    <input type="text" class="form-control" name="judet" value="{{ old('judet') }}" required>
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="phone_number">Numar telefon <span>*</span></label>
                                    <input type="tel" class="form-control" name="telefon" minlength="10" value="{{ old('telefon') }}" required>
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="email_address">Adresa Email  <span>*</span></label>
                                    <input type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                                </div>
                                @if(Session('cart'))
                                <div class="col-12 mb-3">
                                <button type="submit" name="plaseazacomanda"  class="col-sm-4 btn btn-secondary">Plaseaza Comanda</button>
                                </div>  
                                @else
                                <div class="col-12 mb-3">
                                <button type="submit" disabled class="col-sm-4 btn btn-secondary">Plaseaza Comanda</button>
                                </div>
                                @endif
                            </div>
                        </form>
                    </div>
                </div>

                
            </div>
        </div>
    </div>
    <!-- ##### Checkout Area End ##### -->



@endsection