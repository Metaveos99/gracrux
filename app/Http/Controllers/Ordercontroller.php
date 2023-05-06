<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Cookie;

use App\Models\Product;

use App\Models\Order;

use App\Models\Orderdetail;
use App\Models\customer;

use App\Models\Transaction;


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


    function details(Request $req){

        $email = session('userid');

        $client = customer::where('email',$email)->first();

        $user_id = $client->id;
        $user_name = $client->name;
        
        $tok = rand(100000000,10000000000);

        $order = new Order;
        
        $order->order_id =  $tok;
        $order->user_id =  $user_id;
        $order->user_name =  $user_name;

        $order->bill_name = $req->fname." ".$req->lname;

        $order->number = $req->phone;
        $order->email = $req->email;
        $order->city = $req->city;
        $order->state = $req->state;
        $order->zip = $req->zip;
        $order->address = $req->street." , ".$req->apartment;
        $order->Status = "Ordered";

        $order->save();


        $cart_json = request()->cookie('cart');
        $cart = json_decode($cart_json, true);

       $date = date('Y-m-d');

        $total_price = 0;

        if (!empty($cart)) {
            // Loop through the items in the cart
            foreach ($cart as $item) {
                // Get the product details from the database using its ID
                $product = Product::find($item['id']);
    
                $item_total_price = $product->dprice * $item['quantity'];

                $details = new Orderdetail;

                $details->order_id= $tok;


                $details->user_id= $user_id;
                $details->product_id=$product->id;
                $details->productname=$product->name;
                $details->price=$product->price;
                $details->discount=$product->discount;
                $details->quantity=$item['quantity'];
                $details->total=$product->dprice*$item['quantity'];
                $details->order_date= $date;
                $details->status= "Ordered";
                $details->payment_status= "Successful";

                $details->save();

                $total_price += $item_total_price;


                // Check if the product is already in the cart
                $product_key = array_search($product->id, array_column($cart, 'id'));
                if ($product_key !== false) {
                    // If the product is in the cart, remove it
                    unset($cart[$product_key]);
            
                    // Re-index the cart array to remove the gap left by the removed item
                    $cart = array_values($cart);
            
                    // Convert the updated cart to a JSON string
                    $cart_json = json_encode($cart);
            
                    // Store the updated cart in the cookie
                    $cookie = cookie('cart', $cart_json, 60 * 24 * 30);
            
                } 
                
                
                
            }

            $datetime = date('Y-m-d H:i:s');

            $un  = uniqid();

            $money = new Transaction;

            $money->user_id=$user_id;
            $money->user_name=$user_name;
            $money->order_id=$tok;
            $money->payment_method="Credit Card";
            $money->payment_type="Credit";
            $money->amount= $total_price + 50;
            $money->status= "Successful";
            $money->date= $datetime;
            $money->transaction_no= $un;

            $money->save();

        }










        
        
        
        return redirect('cart')->withCookie($cookie);
        


    }


    







}
