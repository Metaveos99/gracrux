<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;

class Webcontroller extends Controller
{
    
    function dash(){

        $user = Product::get();

        return view('home',['pro'=>$user]);

    }


    function detail($name){

        $product = Product::where('name',$name)->first();

        $related = Product::where('name','!=',$name)->limit(4)->get();

        if ($product) {
            return view('product-details',['pro'=>$product,'rel'=>$related]);
            
        }else {
            return redirect('/');
        }

    }



    function pros ($price=null,$cat=null)
    {

       

            if ($price == "High To Low") {
                
                $product = Product::orderBy('price', 'desc')->get();

            }elseif ($price == 'Low To High') {
                $product =  Product::orderBy('price', 'asc')->get();

            }else {

                $product =  Product::get();
            }
            
       

        
        $cat = Product::select('category')->distinct()->get();

        return view('product',['pro'=>$product,'category'=>$cat]);

    }


    function category($cat){

        $product = Product::where('category',$cat)->get();
        $cat = Product::select('category')->distinct()->get();


        if ($product) {
            return view('cproduct',['pro'=>$product,'category'=>$cat]);
            
        }else {
            return redirect('products');
        }

    }






}
