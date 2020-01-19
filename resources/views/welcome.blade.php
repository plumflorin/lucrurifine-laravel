@extends('layouts.app')


@section('content')
<!-- ##### Welcome Area Start ##### -->
<section class="welcome_area bg-img background-overlay" style="background-image: url(img/bg-img/bg-1.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="hero-content">
                        <h2>Colectie noua</h2>
                        <a style="margin-bottom: -10%" href="/shop" class="btn essence-btn">Magazin</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Welcome Area End ##### -->

    <!-- ##### Top Catagory Area Start ##### -->
    <div class="top_catagory_area section-padding-80 clearfix">
        <div class="container">
            <div class="row justify-content-center">
                <!-- Single Catagory -->
                <div class="col-12 col-sm-6 col-md-4">
                    <div class="single_catagory_area d-flex align-items-center justify-content-center bg-img" style="background-image: url(img/bg-img/bg-2.jpg);">
                        <div class="catagory-content">
                            <a href="#">Tricotaje</a>
                        </div>
                    </div>
                </div>
                
                <!-- Single Catagory -->
                <div class="col-12 col-sm-6 col-md-4">
                    <div class="single_catagory_area d-flex align-items-center justify-content-center bg-img" style="background-image: url(img/bg-img/bg-4.jpg);">
                        <div class="catagory-content">
                            <a href="#">Accesorii</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Top Catagory Area End ##### -->

    <!-- ##### New Arrivals Area Start ##### -->
    <section class="new_arrivals_area section-padding-80 clearfix">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading text-center">
                        <h2>Noutati</h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="popular-products-slides owl-carousel">                       
                    @foreach ($produse as $produs)
                        <!-- Single Product -->
                        <div class="single-product-wrapper">
                            <!-- Product Image -->
                            <a href="/shop/produs/{{$produs['id']}}"><div class="product-img">
                                <img src="/storage/images/{{ $produs->imagini[0]->folder_imagine}}/{{$produs->imagini[0]->nume_imagine}}" alt="{{$produs->imagini[0]->nume_imagine}}">
                                <!-- Hover Thumb -->
                                <img class="hover-img" src="/storage/images/{{ $produs->imagini[1]->folder_imagine}}/{{$produs->imagini[1]->nume_imagine}}" alt="{{$produs->imagini[0]->nume_imagine}}">

                                <!-- Product Badge -->
                                @if (!empty($produs['pret_vechi_produs']))                                                                                    
                                            
                                <div class="product-badge offer-badge">
                                    <span>{{round($percent = ($produs['pret_vechi_produs'] - $produs['pret_produs']) / $produs['pret_produs'] * 100)}}% </span>
                                </div>                                            
                                    
                                @endif
                            </div></a>

                            <!-- Product Description -->
                            <div class="product-description">
                                <span>{{ $produs->categorii['nume_categorie']}}</span>
                                <h6>{{ $produs->nume_produs}}</h6>
                                <p class="product-price"><span class="old-price">

                                @isset($produs->pret_vechi_produs)
                                    {{$produs->pret_vechi_produs}}
                                @endisset
                                
                                </span> {{$produs->pret_produs}} LEI</p>
                                        
                            </div>
                        </div>
                    @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### New Arrivals Area End ##### -->

    @endsection