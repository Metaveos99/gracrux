<!DOCTYPE html>
<html lang="zxx">

<head>
<x-headlinks/>

<style>

    .hh-grayBox {
        background-color: #F8F8F8;
        margin-bottom: 20px;
        padding: 35px;
    margin-top: 20px;
    }
    .pt45{padding-top:45px;}
    .order-tracking{
        text-align: center;
        width: 23.33%;
        position: relative;
        display: block;
    }

   


    .order-tracking .is-complete{
        display: block;
        position: relative;
        border-radius: 50%;
        height: 30px;
        width: 30px;
        border: 0px solid #AFAFAF;
        background-color: #f7be16;
        margin: 0 auto;
        transition: background 0.25s linear;
        -webkit-transition: background 0.25s linear;
        z-index: 2;
    }
    .order-tracking .is-complete:after {
        display: block;
        position: absolute;
        content: '';
        height: 14px;
        width: 7px;
        top: -2px;
        bottom: 0;
        left: 5px;
        margin: auto 0;
        border: 0px solid #AFAFAF;
        border-width: 0px 2px 2px 0;
        transform: rotate(45deg);
        opacity: 0;
    }
    .order-tracking.completed .is-complete{
        border-color: #27aa80;
        border-width: 0px;
        background-color: #27aa80;
    }
    .order-tracking.completed .is-complete:after {
        border-color: #fff;
        border-width: 0px 3px 3px 0;
        width: 7px;
        left: 11px;
        opacity: 1;
    }
    .order-tracking p {
        color: #A4A4A4;
        font-size: 16px;
        margin-top: 8px;
        margin-bottom: 0;
        line-height: 20px;
    }
    .order-tracking p span{font-size: 14px;}
    .order-tracking.completed p{color: #000;}
    .order-tracking::before {
        content: '';
        display: block;
        height: 3px;
        width: calc(100% - 40px);
        background-color: #f7be16;
        top: 13px;
        position: absolute;
        left: calc(-50% + 20px);
        z-index: 0;
    }
    .order-tracking:first-child:before{display: none;}
    .order-tracking.completed:before{background-color: #27aa80;}


</style>


</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <x-header/>


    <section>

    <div class="container">
        <h3 class="mb-5">{{$tr->productname}}</h3>
        <h4>Order Id:- #{{$tr->order_id}}</h4>
    </div>

    </section>



   <section>
       @if ($tr->status !='Cancelled')

       
                    <div class="container">
                            <div class="row">
                                <div class="col-12 col-md-12 hh-grayBox pt45 pb20">
                                    <div class="row justify-content-between">
                                        <div class="order-tracking completed">
                                            <span class="is-complete"></span>
                                            <p>Ordered<br><span>{{$tr->order_date}}</span></p>
                                        </div>
                                        <div class="order-tracking" id="ship">
                                            <span class="is-complete"></span>
                                            <p>Shipped<br></p>
                                        </div>

                                       
                                        <div class="order-tracking " id="od">
                                            <span class="is-complete"></span>
                                            <p>Out For Delivery<br></p>
                                        </div>

                                        <div class="order-tracking " id="deli">
                                            <span class="is-complete"></span>
                                            <p>Delivered<br><span id="ddate"></span></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

       

   </section>


   @else

   <div class="container">
        <div class="row">
                                <div class="col-12 col-md-12 hh-grayBox pt45 pb20">
                                    <div class="row justify-content-between">
                                        <div class="order-tracking completed">
                                            <span class="is-complete"></span>
                                            <p>Ordered<br><span>{{$tr->order_date}}</span></p>
                                        </div>
                                        
                                        
                                        <div class="order-tracking ">
                                            <span class="is-complete"></span>
                                            <p>Cancelled<br><span>{{$tr->cancel_date}}</span></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
        </div>

   </section>


   

   @endif
    

    <!-- Footer Section Begin -->
    <x-footer/>
    <!-- Footer Section End -->

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

    var s = "{{$tr->status}}";
    
    

    if (s == "Delivered") {
        
        document.getElementById('ship').classList.add('completed')
        document.getElementById('od').classList.add('completed')
        document.getElementById('deli').classList.add('completed')
        document.getElementById('ddate').innerHTML = "{{$tr->delivery_date}}"

    } else if(s == "Out For Delivery"){
        document.getElementById('ship').classList.add('completed')
        document.getElementById('od').classList.add('completed')
    } else if(s == "Shipped") {
        document.getElementById('ship').classList.add('completed')
    }

   </script>


</body>

</html>