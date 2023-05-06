<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Cookie;

use App\Models\Product;


class Cartcontroller extends Controller
{
    
    function add(Request $req){
        $pid = $req->id;
        $pq = $req->qua;

        if ($pq !=0) {
            // Get the current cart contents from the cookie, or an empty array if it doesn't exist
            $cart = json_decode($req->cookie('cart', '[]'), true);
        
            // Check if the product is already in the cart
            $product_key = array_search($pid, array_column($cart, 'id'));
            if ($product_key !== false) {
                // If the product is already in the cart, update the quantity
                $cart[$product_key]['quantity'] += $pq;
            } else {
                // If the product is not in the cart, add it as a new item
                $cart[] = [
                    'id' => $pid,
                    'quantity' => $pq,
                ];
            }
        
            // Convert the updated cart to a JSON string
            $cart_json = json_encode($cart);
        
            // Store the updated cart in the cookie
            $cookie = cookie('cart', $cart_json, 60 * 24 * 30);
        
            return redirect()->back()->withCookie($cookie);
            
        }else {
            return redirect()->back();
        }
        
    }


    function remove(Request $req){
        $pid = $req->id;
    
        // Get the current cart contents from the cookie, or an empty array if it doesn't exist
        $cart = json_decode($req->cookie('cart', '[]'), true);
    
        // Check if the product is already in the cart
        $product_key = array_search($pid, array_column($cart, 'id'));
        if ($product_key !== false) {
            // If the product is in the cart, remove it
            unset($cart[$product_key]);
    
            // Re-index the cart array to remove the gap left by the removed item
            $cart = array_values($cart);
    
            // Convert the updated cart to a JSON string
            $cart_json = json_encode($cart);
    
            // Store the updated cart in the cookie
            $cookie = cookie('cart', $cart_json, 60 * 24 * 30);
    
            return redirect('cart')->withCookie($cookie);
        } 


    }


        public function updatep(Request $request)
        
        {
            $cart = json_decode($request->cookie('cart'), true);
            $productId = $request->input('id');
            $quantity = $request->input('quantity') + 1;

            if ($quantity !=0) {
                
                foreach ($cart as &$item) {
                    if ($item['id'] == $productId) {
                        $item['quantity'] = $quantity;
                    }
                }
                
                $cart = array_values($cart);
                $cartJson = json_encode($cart);
                $cookie = cookie('cart', $cartJson, 1440);
                
                return redirect('cart')->withCookie($cookie);
               
            }else {
                return redirect('cart');
            }
         
        }


        public function updatem(Request $request)
        
        {
            $cart = json_decode($request->cookie('cart'), true);
            $productId = $request->input('id');
            $quantity = $request->input('quantity') - 1;

            if ($quantity !=0) {
                
                foreach ($cart as &$item) {
                    if ($item['id'] == $productId) {
                        $item['quantity'] = $quantity;
                    }
                }
                
                $cart = array_values($cart);
                $cartJson = json_encode($cart);
                $cookie = cookie('cart', $cartJson, 1440);
                
                return redirect('cart')->withCookie($cookie);
               
            }else {
                return redirect('cart');
            }
         
        }







    function cart(){


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



        return view('cart',['cart'=> $cart_items,'total'=>$total_price]);

    }
    








}
