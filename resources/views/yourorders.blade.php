<!DOCTYPE html>
<html lang="zxx">

<head>
<x-headlinks/>
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <x-header/>

    @if (count($orders)>0)

    <!-- Shoping Cart Section Begin -->
    <section class="shoping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th class="shoping__product">Products</th>
                                    <th>Price</th>
                                    <th>Discount</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th>Track</th>
                                </tr>
                            </thead>
                            <tbody>
                            
                         

                            @foreach ($orders as $order)

                                <tr>
                                    <td class="shoping__cart__item">
                                        <div class="row d-flex align-items-center">
                                           
                                            <div class="col-lg-8 ">
                                                <h5>{{ $order['productname'] }}</h5>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="shoping__cart__price">
                                    ₹ {{ $order['price'] }}
                                    </td>
                                    <td class="shoping__cart__price" style="color:red">
                                        {{ $order['discount'] }} %
                                    </td>
                                    <td class="shoping__cart__price">
                                     {{ $order['quantity'] }}
                                    </td>
                                    <td class="shoping__cart__price">
                                    ₹ {{ $order['total'] }}
                                    </td>

                                    <td>
                                        <form action="trackorder" method="post">
                                            @csrf

                                        <button type="submit" class="btn" style="background-color:#7fad39; color:white;" name='oid' value="{{ $order['id'] }}">Track Order</button>

                                        </form>
                                       
                                    </td>
                                    
                                </tr>

                             @endforeach   
                            </tbody>

                           
                        </table>
                    </div>
                </div>
            </div>

            

            
        </div>
    </section>
    <!-- Shoping Cart Section End -->

    @else

    <div class="m-5 p-5 text-center">
        <h3>No Orders Yet</h3>
        
    </div>
 
                            

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

   


</body>

</html>