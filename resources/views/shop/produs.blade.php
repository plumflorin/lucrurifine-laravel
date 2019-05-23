@extends('layouts.app')


@section('content')

@if(Session::has('success'))
    <div class="row">
        <div class="col-12">
            <span class="alert alert-success">{{ Session::pull('success') }}</span>
        </div>
    </div>
@endif
<!-- ##### Single Product Details Area Start ##### -->
<section class="single_product_details_area d-flex align-items-center">

<!-- Single Product Thumb -->
<div class="single_product_thumb clearfix">
    <div class="product_thumbnail_slides owl-carousel">
    @foreach ($produs->imagini as $imagine)
        <img src="/storage/images/{{ $imagine->folder_imagine}}/{{$imagine->nume_imagine}}" alt="">
    @endforeach
    </div>
</div>

<!-- Single Product Description -->
<div class="single_product_desc clearfix">
    <h2>{{$produs->nume_produs}}</h2>
    <p class="product-price"><span class="old-price">

    @isset($produs->pret_vechi_produs)
        {{$produs->pret_vechi_produs}}
    @endisset
    
    </span> {{$produs->pret_produs}} LEI</p>
    <p class="product-desc">{{$produs->descriere_produs}}</p>

    <!-- Form -->
    <form action="{{url ('/shop/produs/' . $produs->id . '/addtocart')}}" class="cart-form clearfix" method="get">
    @csrf
        <!-- Select Box -->
        <!-- <div class="row"> -->
            <div class="form-group">
                <label class="mt-15 ml-15" for="size">Marime</label>
                <select name="marime" class="form-control col-sm-4">
                    <option value="XL">XL</option>
                    <option value="L">L</option>
                    <option value="M" selected>M</option>
                    <option value="S">S</option>
                    <option value="XS">XS</option>
                </select>                
            </div>
            <div class="form-group">
                <label class="mt-15 ml-15" for="cantitate">Cantitate</label>
                <input name="cantitate" type="number" class="form-control col-sm-4" value="1">
            </div>
        <!-- </div> -->
        <input type="hidden" name="p_id" value="{{$produs->id}}">
        
        <!-- Cart & Favourite Box -->
        <div class="cart-fav-box d-flex align-items-center">
            <!-- Cart -->
            <button type="submit" name="addtocart"  class="col-sm-4 btn btn-light">Adauga Produsul</button>
        </div>
    </form>

  
</div>
</section>


<!-- ##### Single Product Details Area End ##### -->

@endsection