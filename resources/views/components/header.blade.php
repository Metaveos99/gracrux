@php
    $dt = DB::table('products')->select('category')->distinct()->get()

@endphp


@php
// Get the current cart contents from the cookie, or an empty array if it doesn't exist
$cart = json_decode(request()->cookie('cart', '[]'), true);

// Count the number of items in the cart
$items_count = count($cart);
@endphp



<!-- Humberger Begin -->
<div class="humberger__menu__overlay"></div>
    <div class="humberger__menu__wrapper">
        <div class="humberger__menu__logo">
            <a href="/"><h2 class="h2"> <b>Gracrux</b> </h2></a>
        </div>
        <div class="humberger__menu__cart">
            <ul>
                <li><a href="/cart"><i class="fa fa-shopping-bag"></i> <span id="soap1">{{ $items_count }}</span></a></li>
            </ul>
            
        </div>
        <div class="humberger__menu__widget">
            
            <div class="header__top__right__auth">

                @if (session('userid'))
                    <a href="#"><i class="fa fa-user"></i> {{session('useridname')}}</a>
                    <a href="{{route('out')}}"><i class="fa fa-sign-out"></i> Logout</a>

                @else
                <a href="/user-login"><i class="fa fa-user"></i> Login</a>
                @endif

            </div>
        </div>
        <nav class="humberger__menu__nav mobile-menu">
            <ul>
                <li id="homenav"><a href="/">Home</a></li>
                <li id="shopnav"><a href="/products">Products</a></li>
                <li id="your-orders"><a href="/your-orders">My Orders</a></li>
                <li id="contactnav"><a href="/contact">Contact</a></li>
            </ul>
        </nav>
        <div id="mobile-menu-wrap"></div>
        <div class="header__top__right__social">
            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-linkedin"></i></a>
        </div>
        <div class="humberger__menu__contact">
            <ul>
                <li><i class="fa fa-envelope"></i> gracruxpharmaceuticals@gmail.com</li>
            </ul>
        </div>
    </div>
    <!-- Humberger End -->

    <!-- Header Section Begin -->
    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6 d-flex align-items-center">
                        <div class="header__top__left">
                            <ul>
                                <li><i class="fa fa-envelope"></i> gracruxpharmaceuticals@gmail.com</li>
                                
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__right">
                            <div class="header__top__right__social">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="https://www.instagram.com/gracrux.pharma/"><i class="fa fa-instagram"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-linkedin"></i></a>
                                <a href="#"><i class="fa fa-youtube"></i></a>
                            </div>
                            
                            <div class="header__top__right__auth">
                                @if (session('userid'))

                                <nav class="header__menu" style="padding:0px;"> 
                                    <ul>
                                        <li><a href="#"><i class="fa fa-user"></i> {{session('useridname')}}</a>
                                            <ul class="header__menu__dropdown">
                                                <li><a href="your-orders">My Orders</a></li>
                                                <li><a href="{{route('out')}}">Log Out</a></li>
                                            </ul>
                                        </li>
                                    </ul>

                                </nav>

                                
                                 @else
                                 <a href="/user-login"><i class="fa fa-user"></i> Login</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="header__logo">
                        <a href="/"><img style="width:14rem" src="/gralogo.png" alt="Logo"></a>
                    </div>
                </div>
                <div class="col-lg-6 ">
                    <nav class="header__menu">
                        <ul class="hdlinks">
                            <li id="homenav"><a href="/">Home</a></li>
                            <li id="shopnav"><a href="/products">Products</a></li>
                            <li id="your-orders"><a href="/your-orders">My Orders</a></li>
                            <li id="contactnav"><a href="/contact">Contact</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3">
                    <div class="header__cart" id="bag">
                        <ul>
                            <li><a href="/cart"><i class="fa fa-shopping-bag"></i> <span id="soap" >{{ $items_count }}</span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="humberger__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
    <!-- Header Section End -->

     <!-- Hero Section Begin -->
     <section class="hero hero-normal">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="hero__categories">
                        <div class="hero__categories__all">
                            <i class="fa fa-bars"></i>
                            <span>All Categories </span>
                        </div>
                        <ul>
                           
                            @foreach ($dt as $d )


                            <li><a href="{{route('uniq',['cat'=>$d->category])}}">{{$d->category}}</a></li>
                                

                            @endforeach

                            
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="hero__search">
                        <div class="hero__search__form">
                            <form action="{{route('search')}}" method="get">
                                <input type="text" name="sda" placeholder="What do yo u need?">
                                <button type="submit" class="site-btn">SEARCH</button>
                            </form>
                        </div>
                        <div class="hero__search__phone" id="tdnone">
                            <div class="hero__search__phone__icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="hero__search__phone__text ">
                                <h5>+91 9372692651</h5>
                                <span>Support 24/7</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->


   