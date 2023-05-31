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

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <x-header/>
    <x-wapp/>
    

    

  <!-- Product Section Begin -->
  <section class="product spad">
        <div class="container">
           
                
                    <div class="row">

                    @if(count($pro) > 0)

                        @foreach ($pro as $pr )
                            
                                <div class="col-lg-4 mb-3">
                                    <div class="product__discount__item">
                                        <div class="product__discount__item__pic set-bg" ondblclick="location.replace('/details/{{$pr->name}}')"
                                            data-setbg="/{{$pr->img1}}">
                                            <div class="product__discount__percent">-{{$pr->discount}}%</div>
                                            <ul class="product__item__pic__hover">
                                                <li><a href="/details/{{$pr->name}}"><i class="fa fa-eye"></i></a></li>
                                                <li>

                                                <form action="/addtocart" method="post" class="pf">

                                        @csrf

                                        <input class="d-none qa" type="text" value="1" name="qua" id="qua">

                                        <button class="btn rounded-circle iod" data-value="{{$pr->id}}" style="background-color:white;" type="submit" name="id" value="{{$pr->id}}" ><i class="fa fa-shopping-cart"></i></button>

                                    </form>
                                    

                                                </li>
                                            </ul>
                                        </div>
                                        <div class="product__discount__item__text">
                                            <span>{{$pr->category}}</span>
                                            <h5 class="trunc"><a href="/details/{{$pr->name}}">{{$pr->name}}</a></h5>
                                            <span class="d-none">{{ $t=round(($pr->price/100)*$pr->discount)}}  </span>
                                            <div class="product__item__price">₹ {{$pr->price - $t}} <span>₹{{$pr->price}}</span></div>
                                        </div>
                                    </div>
                                </div>

                        @endforeach
                    @else

                    <div class="col-md-12 mb-5 mt-5">
                        <h3 class="text-center">No Result Found</h3>    
                    </div>
                    @endif

                    </div>
                    
                
            </div>
        </div>
    </section>
    <!-- Product Section End -->
    <x-itemadded/>
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

<script>
       $(document).ready(function(){

        $('.pf').on('submit',function (e) {
            e.preventDefault();


        })

        $(".iod").click(function() {
            var id = JSON.parse($(this).attr("data-value"));
            var qua = 1;

            $.get("/addtocart", {
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