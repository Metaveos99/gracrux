<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Cookie;

use App\Models\Product;


class Ordercontroller extends Controller
{
    function check(){


        $cart_json = request()->cookie('cart');
        $cart = json_decode($cart_json, true);

        // Initialize an empty array to store the cart items with details
        $cart_items = [];

        $total_price = 0;

        if (!empty($cart)) {
            // Loop through the items in the cart
            foreach ($cart as $item) {
                // Get the product details from the database using its ID
                $product = Product::find($item['id']);
    
                $item_total_price = $product->dprice * $item['quantity'];

                

                // Add the product details and quantity to the cart items array
                $cart_items[] = [
                    'id' => $product->id,
                    'name' => $product->name,
                    'discount' => $product->discount,
                    'img' => $product->img1,
                    'price' => $product->price,
                    'quantity' => $item['quantity'],
                    'total'=>$product->dprice*$item['quantity']
                    
                ];
    
                $total_price += $item_total_price;
            }
        }



        return view('checkout',['cart'=> $cart_items,'total'=>$total_price]);


        
    }


}
