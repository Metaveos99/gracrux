<!DOCTYPE html>
<html lang="zxx">

<head>
<x-headlinks/>

<style>
    .trunc{
        overflow:hidden;
        white-space:nowrap;
        text-overflow:ellipsis;
        
    }

    
</style>


</head>

<body id="bod">
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <x-header/>

    <section>
        <div class="container mb-5">
            <div class="hero__item set-bg" data-setbg="img/hero/ban.jpg">
                <div class="hero__text">
                    
                    <h2>Fresh Herbal Products <br />100% Pure</h2>
                    <p class="text-white">Be Chemically Free</p>
                    <a href="/products" class="primary-btn">SHOP NOW</a>
                </div>
            </div>
        </div>
    </section>
    

    <!-- Categories Section Begin -->
    <section class="categories">
        <div class="container">
            <div class="row">
                <div class="categories__slider owl-carousel">
                    @foreach ($pro as $p )
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="{{$p->img1}}">
                            <h5 ><a href="details/{{$p->name}}" class="trunc">{{$p->name}}</a></h5>
                        </div>
                    </div>
                    @endforeach
                    
                </div>
            </div>
        </div>
    </section>
    <!-- Categories Section End -->

    <!-- Featured Section Begin -->
    <section class="featured spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Featured Product</h2>
                    </div>
                    
                </div>
            </div>
            <div class="row featured__filter justify-content-center">

                @foreach ( $pro as $pr )
                <div class="col-md-5 col-sm-6 mix oranges fresh-meat border m-2 ho ">
                    <div class="featured__item">
                        <div class="featured__item__pic set-bg" data-setbg="{{$pr->img1}}">
                            <ul class="featured__item__pic__hover">
                                <li><a href="details/{{$pr->name}}"><i class="fa fa-eye"></i></a></li>
                                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="featured__item__text">
                            <h6 class="trunc"><a href="#">{{$pr->name}}</a></h6>
                            <span class="d-none">{{ $t=round(($pr->price/100)*$pr->discount)}}  </span>
                            <h5 class="mb-1"><del style="color:#1c1c1c80;">₹ {{$pr->price}}</del></h5>
                            <h5 class="mb-1">₹ {{$pr->price-$t}} /-</h5>
                            <h6 class="mb-1" style="color:red;">{{$pr->discount}}% off</h6>
                        </div>
                    </div>
                </div>
                @endforeach
                
            </div>
        </div>
    </section>
    <!-- Featured Section End -->

    <!-- Banner Begin -->
    <div class="banner mb-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="banner__pic">
                        <a href="/products">
                            <img style="height:25rem" src="img/banner/ban1.jpg" alt="">
                        </a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="banner__pic">
                        <a href="/products">
                            <img style="height:25rem" src="img/banner/ban3.jpg" alt="">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Banner End -->

    

    
    <x-footer/>

    <!-- Js Plugins -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/mixitup.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>


    <script>
        document.getElementById('homenav').classList.add('active');
    </script>

</body>

</html>