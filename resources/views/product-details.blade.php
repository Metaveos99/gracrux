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

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <x-header/>

    
     <!-- Product Details Section Begin -->
     <section class="product-details spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__pic">
                        <div class="product__details__pic__item">
                            <img class="product__details__pic__item--large"
                                src="/{{$pro['img1']}}" alt="">
                        </div>
                        <div class="product__details__pic__slider owl-carousel">
                            <img data-imgbigurl="/{{$pro['img2']}}"
                                src="/{{$pro['img2']}}" alt="">
                            <img data-imgbigurl="/{{$pro['img3']}}"
                                src="/{{$pro['img3']}}" alt="">
                            <img data-imgbigurl="/{{$pro['img4']}}"
                                src="/{{$pro['img4']}}" alt="">
                            <img data-imgbigurl="/{{$pro['img5']}}"
                                src="/{{$pro['img5']}}" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__text">
                        <h3>{{$pro['name']}}</h3>
                        <div class="product__details__rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-half-o"></i>
                           
                        </div>
                        <span class="d-none">{{ $t=round(($pro->price/100)*$pro->discount)}}  </span>
                        <div class="product__details__price">₹ <del style="color:#ff000082;"> {{$pro['price']}} </del> {{$pro['price']-$t}} /-</div>
                        <div class="product__details__price">You Save ₹ {{$t}} ({{$pro->discount}}%)</div>
                        <p> {{$pro['description']}} </p>
                        <div class="product__details__quantity">
                            <div class="quantity">
                                <div class="pro-qty">
                                    <input type="text" value="1">
                                </div>
                            </div>
                        </div>
                        <a href="#" class="primary-btn">ADD TO CART</a>
                        <a href="#" class="primary-btn">BUY NOW</a>
                        
                        <ul>
                            <li><b>Stock</b> <span>{{$pro['stock']}}</span></li>
                            <li><b>Shipping</b> <span>01 day shipping. <samp>Free pickup today</samp></span></li>
                            <li><b>Category</b> <span>{{$pro['category']}}</span></li>
                            
                        </ul>
                    </div>
                </div>
                
            </div>
        </div>
    </section>
    <!-- Product Details Section End -->

    <!-- Related Product Section Begin -->
    <section class="related-product">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title related__product__title">
                        <h2>You might be interested in</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($rel as $r)
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="product__item">
                        <div class="product__item__pic set-bg" data-setbg="/{{$r->img1}}">
                            <ul class="product__item__pic__hover">
                                <li><a href="{{$r->name}}"><i class="fa fa-eye"></i></a></li>
                                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6 class="trunc"><a href="{{$r->name}}" >{{$r->name}}</a></h6>
                            <span class="d-none">{{ $t=round(($r->price/100)*$r->discount)}}  </span>
                            <h5>₹<del style="color:#1c1c1c80;"> {{$r->price}}</del> {{$r->price-$t}}</h5>
                            
                            <h5 style="color:red;">{{$r->discount}}% off</h5>
                        </div>
                    </div>
                </div>
                    
                @endforeach
                
            </div>
        </div>
    </section>
    <!-- Related Product Section End -->

    

  

    <!-- Footer Section Begin -->
    <x-footer/>
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <script src="/js/jquery-3.3.1.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/jquery.nice-select.min.js"></script>
    <script src="/js/jquery-ui.min.js"></script>
    <script src="/js/jquery.slicknav.js"></script>
    <script src="/js/mixitup.min.js"></script>
    <script src="/js/owl.carousel.min.js"></script>
    <script src="/js/main.js"></script>

<script>
     document.getElementById('shopnav').classList.add('active');
</script>

</body>

</html>