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

    <x-wapp/>

    @if (count($cart)>0)

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
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                            
                         

                            @foreach ($cart as $cart_item)

                                <tr>
                                    <td class="shoping__cart__item">
                                        <div class="row d-flex align-items-center">
                                            <div class="col-lg-4">
                                                <img src="{{ $cart_item['img'] }}" alt="">
                                            </div>
                                            <div class="col-lg-8 ">
                                                <h5>{{ $cart_item['name'] }}</h5>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="shoping__cart__price">
                                    ₹ {{ $cart_item['price']}}
                                    </td>
                                    <td class="shoping__cart__price" style="color:red">
                                      {{ $cart_item['discount'] }} %
                                    </td>
                                    <td class="shoping__cart__quantity">
                                        <div class="d-flex justify-content-center">
                                        <form action="cartupdatem" method="post" id="qform">
                                                 @csrf
                                                <input class="d-none" type="text" name="id" value="{{$cart_item['id']}}">
                                                <input class="d-none" type="text" name="quantity" value="{{ $cart_item['quantity'] }}">
                                                <button type="submit" class="btn btn-secondary" name="minus">-</button>
                                        </form>
                                        
                                        <input type="text" style="width:2.5rem" value="{{ $cart_item['quantity'] }}" class="form-control" readonly>

                                        <form action="cartupdatep" method="post" id="qform">
                                                 @csrf
                                                <input class="d-none" type="text" name="id" value="{{$cart_item['id']}}">
                                                <input class="d-none" type="text" name="quantity" value="{{ $cart_item['quantity'] }}">
                                              
                                                <button type="submit" class="btn btn-secondary" name="plus">+</button>
                                        </form>

                                                </div>

                                        
                                    </td>
                                    
                                    <td class="shoping__cart__total">
                                    ₹ {{ $cart_item['total'] }}
                                    </td>
                                    <td class="shoping__cart__item__close">
                                        <form action="/remove" method="post">
                                            @csrf
                                            <button type="submit" id="rem" name="id" value="{{$cart_item['id']}}" class="btn">
                                                <span class="icon_close"></span>
                                            </button>
                                        </form>
                                    </td>
                                </tr>

                             @endforeach   
                            </tbody>

                           
                        </table>
                    </div>
                </div>
            </div>

            

            <div class="row">
                <div class="col-lg-6">
                    <div class="shoping__cart__btns">
                        <a href="/products" class="primary-btn cart-btn">CONTINUE SHOPPING</a>
                       
                    </div>
                </div>
                
                <div class="col-lg-6">
                    <div class="shoping__checkout">
                        <h5>Cart Total</h5>
                        <ul>
                            <li>Subtotal <span>₹{{$total}}</span></li>
                            <li>Delivery Charge <span>₹50</span></li>
                            <li>Total <span>₹ {{$total + 50}}</span></li>
                        </ul>
                        <a href="/checkout" class="primary-btn">PROCEED TO CHECKOUT</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shoping Cart Section End -->

    @else

    <div class="m-5 p-5 text-center">
        <h3>Your Cart Is Empty</h3>
        
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