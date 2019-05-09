@extends('layouts.app')


@section('content')
    <!-- ##### Shop Grid Area Start ##### -->
    <section class="shop_grid_area section-padding-80">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-4 col-lg-3">
                    <div class="shop_sidebar_area">

                        <!-- ##### Single Widget ##### -->
                        <div class="widget catagory mb-50">
                            <!-- Widget Title -->
                            <h6 class="widget-title mb-30">Catagories</h6>

                            <!--  Catagories  -->
                            <div class="catagories-menu">
                                <ul id="menu-content2" class="menu-content">
                                    <!-- Single Item -->
                                    <ul class="" id="clothing">
                                            <li><a href="{{url ('shop')}}">All</a></li>

                                            @foreach ($categorii as $categorie)
                                                
                                                    <li><a href="{{url ('shop' . '/categorie/' . $categorie['id'])}}">{{$categorie['nume_categorie']}}</a></li>
                                                    <input type="hidden" id="categ"  value="{{$categorie['id']}}" />

                                            @endforeach
                                                                                        
                                        </ul>
                                    </li>                                   
                                </ul>
                            </div>
                        </div>                                       
                    </div>
                </div>

                <div class="col-12 col-md-8 col-lg-9">
                    <div class="shop_grid_product_area">
                        <div class="row">
                            <div class="col-12">
                                <div class="product-topbar d-flex align-items-center justify-content-between">
                                    <!-- Total Products -->
                                    <div class="total-products">
                                        <p><span>{{ count($produse)}}</span> produse </p>
                                    </div>
                                    <!-- Sorting -->
                                    <div class="product-sorting d-flex">
                                        <p>Sortare dupa:</p>
                                        
                                            <select name="select" id="sortByCatselect">
                                                @foreach ($options as $key => $option)                                                
                                                    <option value="{{$key}}" {{  $key == $select ? "selected" : "" }}>{{$option}}</option>
                                                    <!-- <option value="crescator">Pret crescator</option> -->
                                                    <!-- <option value="descrescator">Pret descrescator</option> -->
                                                @endforeach
                                            </select>                                            
                                        
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">

                            @foreach ($produse as $produs)

                            <!-- Single Product -->
                            <div class="col-12 col-sm-6 col-lg-4">
                                <div class="single-product-wrapper">
                                    <!-- Product Image -->
                                    <a href="/shop/produs/{{$produs['id']}}"><div class="product-img">
                                        <img src="/storage/images/{{ $produs->imagini[0]->folder_imagine}}/{{$produs->imagini[0]->nume_imagine}}" alt="{{$produs->imagini[0]->nume_imagine}}">
                                        <!-- Hover Thumb -->
                                        <img class="hover-img" src="/storage/images/{{ $produs->imagini[1]->folder_imagine}}/{{$produs->imagini[1]->nume_imagine}}" alt="{{$produs->imagini[0]->nume_imagine}}">

                                        <!-- Product Badge -->
                                        @if (!empty($produs['pret_vechi_produs']))                                                                                    
                                            
                                            <div class="product-badge offer-badge">
                                                <span>-{{round($percent = ($produs['pret_vechi_produs'] - $produs['pret_produs']) / $produs['pret_vechi_produs'] * 100)}}% </span>
                                            </div>                                            
                                            
                                        @endif                          
                                    </div></a>

                                    <!-- Product Description -->
                                    <div class="product-description">
                                        <span>{{ $produs->categorii['nume_categorie']}}</span>
                                        <a href="single-product-details.html">
                                            <h6>{{ $produs->nume_produs}}</h6>
                                        </a>
                                        <p class="product-price"><span class="old-price">

                                        @isset($produs->pret_vechi_produs)
                                          {{$produs->pret_vechi_produs}}
                                        @endisset
                                        
                                        </span> {{$produs->pret_produs}} LEI</p>

                                        <!-- Hover Content -->
                                        <div class="hover-content">
                                            <!-- Add to Cart -->
                                            <div class="add-to-cart-btn">
                                                <a href="#" class="btn essence-btn">Add to Cart</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>                        
                    </div>
                    <!-- Pagination -->

                    <nav>
                    {{ $produse->links() }}
                    </nav>

                    <!-- <nav aria-label="navigation">
                        <ul class="pagination mt-50 mb-70">
                            <li class="page-item"><a class="page-link" href="#"><i class="fa fa-angle-left"></i></a></li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">...</a></li>
                            <li class="page-item"><a class="page-link" href="#">21</a></li>
                            <li class="page-item"><a class="page-link" href="#"><i class="fa fa-angle-right"></i></a></li>
                        </ul>
                    </nav> -->
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Shop Grid Area End ##### -->

    @endsection

