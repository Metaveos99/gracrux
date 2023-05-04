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

    

    

  <!-- Product Section Begin -->
  <section class="product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-5">
                    <div class="sidebar">
                        <div class="sidebar__item">
                            <h4>Filter</h4>
                            <ul>
                                @foreach ($category as $cat )
                                
                                <li><a href="{{$cat->category}}">{{$cat->category}}</a></li>
                                    
                                @endforeach
                                
                            </ul>
                        </div>
                        
                        
                    </div>
                </div>
                <div class="col-lg-9 col-md-7">
                    <div class="product__discount">
                        <div class="section-title product__discount__title">
                            <h2>Sale Off</h2>
                        </div>
                        
                    
              
                        <div class="row">
                            <div class="col-lg-4 col-md-5">
                                <div class="filter__sort">
                                    <span>Sort By</span>
                                    <select id="sort">
                                        <option value="Default">Default</option>
                                        <option value="Low To High">Price Low To High</option>
                                        <option value="High To Low">Price High To Low</option>
                                    </select>
                                </div>
                            </div>
                            
                        </div>
                        </div>
                    <div class="row">

                        @foreach ($pro as $pr )
                            
                        

                        <div class="col-lg-4 mb-3">
                                    <div class="product__discount__item">
                                        <div class="product__discount__item__pic set-bg"
                                            data-setbg="/{{$pr->img1}}">
                                            <div class="product__discount__percent">-{{$pr->discount}}%</div>
                                            <ul class="product__item__pic__hover">
                                                <li><a href="/details/{{$pr->name}}"><i class="fa fa-eye"></i></a></li>
                                                <li>

                                                <form action="/addtocart" method="post">

                                        @csrf

                                        <input class="d-none" type="text" value="1" name="qua" id="qua">

                                        <button class="btn rounded-circle" style="background-color:white;" type="submit" name="id" value="{{$pr->id}}" ><i class="fa fa-shopping-cart"></i></button>

                                    </form>
                                    

                                                </li>
                                            </ul>
                                        </div>
                                        <div class="product__discount__item__text">
                                            <span>{{$pr->category}}</span>
                                            <h5 class="trunc"><a href="{{$pr->name}}">{{$pr->name}}</a></h5>
                                            <div class="product__item__price">₹ {{$pr->dprice}} <span>₹{{$pr->price}}</span></div>
                                        </div>
                                    </div>
                                </div>
                        @endforeach
                    </div>
                    
                </div>
            </div>
        </div>
    </section>
    <!-- Product Section End -->

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

<script>

    $('#sort').change(function(){

       var val = $('#sort').val()

       window.location.href = "/products/"+val;
       

    });


</script>

</body>

</html>