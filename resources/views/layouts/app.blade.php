
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title>Lucruri Fine</title>

    <!-- Favicon  -->
    <link rel="icon" href="/favicon.ico">

    <!-- Core Style CSS -->
    <link rel="stylesheet" href="/css/core-style.css">
    <link rel="stylesheet" href="/css/style.css">

</head>

<body>
@include('cookieConsent::index')
    <!-- ##### Header Area Start ##### -->
    <header class="header_area">
        <div class="classy-nav-container breakpoint-off d-flex align-items-center justify-content-between">
            <!-- Classy Menu -->
            <nav class="classy-navbar" id="essenceNav">
                <!-- Logo -->
                <a class="nav-brand" href="/"><img src="/img/core-img/logo.png" alt=""></a>
                <!-- Navbar Toggler -->
                <div class="classy-navbar-toggler">
                    <span class="navbarToggler"><span></span><span></span><span></span></span>
                </div>
                <!-- Menu -->
                <div class="classy-menu">
                    <!-- close btn -->
                    <div class="classycloseIcon">
                        <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                    </div>
                    <!-- Nav Start -->
                    <div class="classynav">
                        <ul>                            
                            <li><a href="/shop">Shop</a></li>
                            <li><a href="/contact">Contact</a></li>
                        </ul>
                    </div>
                    <!-- Nav End -->
                </div>
            </nav>

            <!-- Header Meta Data -->
            <div class="header-meta d-flex clearfix justify-content-end">
                
                <!-- Cart Area -->
                <div class="cart-area">
                    <a href="#" id="essenceCartBtn"><img src="/img/core-img/bag.svg" alt=""> <span>
                    @if(Session('cart'))
                        {{ count(Session('cart')) }}
                    @endif                    
                    </span></a>
                </div>
            </div>
        </div>
    </header>
    <!-- ##### Header Area End ##### -->

    <!-- ##### Right Side Cart Area ##### -->
    <div class="cart-bg-overlay"></div>

    <div class="right-side-cart-area">

        <!-- Cart Button -->
        <div class="cart-button">
            <a href="#" id="rightSideCart"><img src="/img/core-img/bag.svg" alt=""> <span>
            @if(Session('cart'))
                {{ count(Session('cart')) }}
            @endif
            </span></a>
        </div>

        <div class="cart-content d-flex">

            <!-- Cart List Area -->
            <div class="cart-list">
            @if(session()->has('cart'))
                @foreach(Session('cart') as $key => $detalii)   

                <!-- Single Cart Item -->
                <div id="{{$detalii['id']}}" class="single-cart-item">
                    <a href="/shop/produs/{{$detalii['id']}}" class="product-image">
                        <img src="{{$detalii['imagine']}}" class="cart-thumb" alt="">
                        <!-- Cart Item Desc -->
                        <div class="cart-item-desc">
                          <span class="product-remove"><i data-id="{{ $key }}" data-token="{{ csrf_token() }}" class="fa fa-close delfromcart" aria-hidden="true"></i></span>
                            <h6>{{ $detalii['denumire'] }}</h6>
                            <p class="size">Marime: {{$detalii['marime']}}</p>
                            <p class="color">Cantitate: {{$detalii['cantitate']}}</p>
                            <p class="price">{{ $detalii['pret']}} LEI</p>
                        </div>
                    </a>
                </div>

                @endforeach
            @endif
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
            <!-- Cart Summary -->
            <div class="cart-amount-summary">

                <h2>Sumar Comanda</h2>
                <ul class="summary-table">
                    <li><span>subtotal:</span> <span>{{$subtotal}} LEI</span></li>
                    <li><span>livrare:</span> <span>
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
                    <li><span>total:</span> <span>
                    
                    <?php
                    if ($subtotal > 0) {                      
                        echo $subtotal + $livrare . " LEI";
                      
                    } else {
                      echo 0 . " Lei";
                    }
                    ?>
                    
                    </span></li>
                </ul>
                @if(Session('cart'))
                <div class="checkout-btn mt-100">
                    <a href="/checkout" class="btn essence-btn">Pasul Urmator</a>
                </div>
                @endif
            </div>
        </div>
    </div>
    <!-- ##### Right Side Cart End ##### -->

    @yield('content')

    

    <!-- ##### Footer Area Start ##### -->
    <footer class="footer_area clearfix py-2">
        <div class="container">
            <div class="row">
                <!-- Single Widget Area -->
                <div class="col-12 text-center">
                    <div class="single_widget_area">
                        <div class="footer_social_area">
                            <a href="/shop">Shop</a>
                            <a href="/contact">Contact</a>
                            <a href="/livrare">Livrare produse</a>
                            <a href="/politica-de-confidentialitate">Confidentialitate</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                
                <!-- Single Widget Area -->
                <div class="col-12 text-center">
                    <div class="single_widget_area">
                        <div class="footer_social_area">
                            <a href="http://www.facebook.com/lucruri.fine" target="_blank" data-toggle="tooltip" data-placement="top" title="Facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                            <a href="http://www.instagram.com/Lucrurifine" target="_blank" data-toggle="tooltip" data-placement="top" title="Instagram"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12 text-center">
                <p>Made by © <a href="http://www.plumdesign.ro" target="_blank">plumdesign</a></p>
                    </p>
                </div>
            </div>

        </div>

        <div class="row" style="display: none">
                <div class="col-12 text-center">
                    <p >
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
    Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </p>
                </div>
            </div>

        </div>
    </footer>
    <!-- ##### Footer Area End ##### -->

    <!-- jQuery (Necessary for All JavaScript Plugins) -->
    <script src="/js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="/js/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="/js/bootstrap.min.js"></script>
    <!-- Plugins js -->
    <script src="/js/plugins.js"></script>
    <!-- Classy Nav js -->
    <script src="/js/classy-nav.min.js"></script>
    <!-- Active js -->
    <script src="/js/active.js"></script>

    <script src="/js/custom.js"></script>

    @if(Session::has('success'))
    <script type="text/javascript">
        $(document).ready(function() {
            $('#successmodal').modal();
        });
    </script>

    <div id="successmodal" class="modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content text-center">
                <div class="modal-header"  style="background-color: #5cb85c">
                    <h5 class="modal-title">Succes</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>{{ session()->get('success') }}</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">OK</button>        
                </div>
            </div>
        </div>
    </div>
    @endif

    @if(Session::has('pretegalprod'))
    <script type="text/javascript">
        $(document).ready(function() {
            $('#pretegalprod').modal();
        });
    </script>

    <div id="pretegalprod" class="modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content text-center">
                <div class="modal-header" style="background-color: #d9534f">
                    <h5 class="modal-title">Eroare</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>{{ Session::pull('pretegalprod') }}</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Inchide</button>                
                </div>
            </div>
        </div>
    </div>
@endif


@include('cookieConsent::index')
</body>

</html>