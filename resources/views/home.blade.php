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

    .set-bg{
        cursor: pointer;
    }


    
    
</style>


</head>

<body id="bod">
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <x-header/>

   
    <x-wapp/>
    

    <section>
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                 <img class="d-block w-100" src="/gbanner23a.webp" alt="First slide">
                </div>
                <div class="carousel-item">
                <img class="d-block w-100" src="/BANNER3.webp" alt="Second slide">
                
                </div>
                <div class="carousel-item">
                <img class="d-block w-100" src="/gbanner24a.webp" alt="Third slide">
                
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </section>


    <!-- Categories Section Begin -->
    <section class="categories mt-5 border sgb" >
        <div class="container">
            <div class="row">
                <div class="categories__slider owl-carousel">
                    @foreach ($pro as $p )
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" onclick="location.replace('details/{{$p->name}}')" data-setbg="{{$p->img1}}">
                            <h5 ><a href="details/{{$p->name}}" class="trunc bg-white">{{$p->name}}</a></h5>
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
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Featured Products</h2>
                        
                    </div>
                    
                </div>
            </div>
            <div class="row featured__filter justify-content-center">

                @foreach ( $pro as $pr )
                <div class="col-md-3 mix oranges fresh-meat border m-2 ho sha">
                    <div class="featured__item">
                        <div class="featured__item__pic set-bg" ondblclick="location.replace('details/{{$pr->name}}')" data-setbg="{{$pr->img1}}">
                            <ul class="featured__item__pic__hover">
                                <li><a href="details/{{$pr->name}}"><i class="fa fa-eye"></i></a></li>
                                <li>

                                <form action="/addtocart" method="post" class="pf">

                                        @csrf

                                        <input class="d-none qa" type="text" value="1" name="qua" id="qua">

                                        <button class="btn rounded-circle iod" data-value="{{$pr->id}}" style="background-color:white;" type="submit" name="id" value="{{$pr->id}}" ><i class="fa fa-shopping-cart"></i></button>

                                    </form>
                                    

                                </li>
                            </ul>
                        </div>
                        <div class="featured__item__text">
                            <h6 class="trunc"><a href="details/{{$pr->name}}">{{$pr->name}}</a></h6>
                            <h5 class="mb-1">₹ {{$pr->dprice}} /-<del style="color:#1c1c1c80;"> ₹ {{$pr->price}}</del></h5>
                            <h6 class="mb-1" style="color:red;">{{$pr->discount}}% off</h6>
                        </div>
                    </div>
                </div>
                @endforeach
                
            </div>
        </div>
    </section>
    <!-- Featured Section End -->

    <section>
        <div class="container mb-5">
            <img src="/PAGE12C.webp" alt="certified" class="img-fluid">
        </div>
    </section>


<!-- Banner Begin -->
<div class="banner mb-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="banner__pic">
                        <a href="/details/PUSHT-ADE%20%7C%20MASSAGE%20OIL%20%7C%20100ML%20%7C%20ENRICHED%20WITH%20NATURAL%20VITAMINS%20A,D,E%20&%20OLIVE%20OIL">
                            <img style="height:25rem" src="/pagebanner1.webp" alt="">
                        </a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="banner__pic">
                        <a href="/details/THICK%20AND%20DENSE%20HAIR%20OIL%20%7C%20100%20ML%20%7C%20A%20COMPREHENSIVE%20HAIR%20OIL%20FORTIFIED%20WITH%2011%20ESSENTIALS%20OILS%20AND%2019%20HERBS">
                            <img style="height:25rem" src="/pagebanner2.webp" alt="">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Banner End -->

    <section class="mb-5">
        <div class="container-fluid text-center text-white p-3" style="height:20rem; background-color: #231834;">
                    <div class="section-title">
                        <h2>Testimonials</h2>
                    </div>

        <div >
            <h2>Explore Our Clients Experience</h2>
        </div>
        </div>
        <div class="container" style="margin-top:-7rem">
            <div class="row">
                <div class="col-md-4">
                    <div class="card p-2">
                        <div class="d-flex justify-content-center">
                            <img class="card-img-top" style="width:5rem; height:5rem; border-radius:100%" src="/test1.jpg" alt="Card image cap">
                        </div>
                        <div class="card-body text-center">
                            
                            <h5 class="card-title">Sulekha Mishra</h5>
                            <p class="card-text">"I have been using Gracrux Herbal Products for a few months now and I have been very happy with the results. I have tried a variety of products and they have all been effective for me. I would definitely recommend Gracrux Herbal Products to anyone looking for a natural way to improve their health."</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card p-2">
                        <div class="d-flex justify-content-center">
                            <img class="card-img-top" style="width:5rem; height:5rem; border-radius:100%" src="/test2.jpg" alt="Card image cap">
                        </div>
                        <div class="card-body text-center">
                            
                            <h5 class="card-title">Harjeet Singh</h5>
                            <p class="card-text">"I was skeptical at first about using herbal supplements, but I am so glad I gave Gracrux Herbal Products a try. I have been using their KABZ relief product for a few weeks now and I have noticed a significant improvement in my pain levels. I would definitely recommend Gracrux Herbal Products to anyone who is looking for a natural way to relieve Abdominal Discomfort."</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card p-2">
                        <div class="d-flex justify-content-center">
                            <img class="card-img-top" style="width:5rem; height:5rem; border-radius:100%" src="/test3.jpg" alt="Card image cap">
                        </div>
                        <div class="card-body text-center">
                            
                            <h5 class="card-title">Monika Sharma</h5>
                            <p class="card-text">"I have been using Gracrux Herbal Products for a few months now and I have been very impressed with the results. I have tried a variety of products for my skin problems, but nothing has worked as well as Gracrux Herbal Products, specially the Red Clean. It improve's Your skin significantly" </p>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </section>


    <x-itemadded/>

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

    <script>
       $(document).ready(function(){

        $('.pf').on('submit',function (e) {
            e.preventDefault();

        })

        $(".iod").click(function() {
            var id = JSON.parse($(this).attr("data-value"));
            var qua = 1;

            $.get("addtocart", {
                qua: JSON.stringify(qua),
                id: JSON.stringify(id)
            }, function(response) {
                
                $('#soap').html(response.count);
                $('#soap1').html(response.count);
                $('#itemnotification').show();
              
                setTimeout(() => {
                    $('#itemnotification').hide();
                }, 2000);

            });
            

        });


       });
    </script>
    

</body>

</html>