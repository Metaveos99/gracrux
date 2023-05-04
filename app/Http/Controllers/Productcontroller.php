<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;

class Productcontroller extends Controller
{
    
    function add(Request $req){


        $img1= $req->file('img1')->store('public');
        $img1= "storage" . substr_replace($img1, "", 0, 6);

        $img2= $req->file('img2')->store('public');
        $img2= "storage" . substr_replace($img2, "", 0, 6);

        $img3= $req->file('img3')->store('public');
        $img3= "storage" . substr_replace($img3, "", 0, 6);

        $img4= $req->file('img4')->store('public');
        $img4= "storage" . substr_replace($img4, "", 0, 6);

        $img5= $req->file('img5')->store('public');
        $img5= "storage" . substr_replace($img5, "", 0, 6);



        $product= new Product;

        $product->name=$req->pname;
        $product->price=$req->price;
        $product->discount=$req->discount;
        $product->dprice=$req->dprice;
        $product->category=$req->category;
        $product->stock="Available";
        $product->description=$req->description;
        $product->img1=$img1;
        $product->img2=$img2;
        $product->img3=$img3;
        $product->img4=$img4;
        $product->img5=$img5;

        $product->save();

        if ($product) {
            
            return redirect('addproducts')->with("success","Product Added Successfully");

        }else {
            return redirect('addproducts')->with("fail","Something Went Wrong");
        }


    }


    function display(){

        $products = Product::get();

        return view('admins.products',['data'=>$products]);
    }

    function delete(){

        $products = Product::get();

        return view('admins.removeproduct',['data'=>$products]);
    }



    function prodelete(Request $req){

        $products = Product::where('id',$req->id);

        $products->delete();

        return redirect('removeproduct')->with("del", "Deleted Successfully" );
    }

    
    function proedit(){

        $products = Product::get();

        return view('admins.editproduct',['data'=>$products]);

    }


    function aja (Request $req){

        $data = Product::where('id',$req->datas)->first();

        return $data;

    }

    function proup (Request $req){

        $data = Product::where('id',$req->sr)->first();


        $data->name=$req->pname;
        $data->price=$req->price;
        $data->dprice=$req->dprice;
        $data->discount=$req->discount;
        $data->stock=$req->stock;
        $data->category=$req->category;
        $data->description=$req->description;

        $data->save();

        return redirect("editproducts")->with("success", "Updated Successfully");


    }



    function proupimg(Request $req){


        $img1= $req->file('img1')->store('public');
        $img1= "storage" . substr_replace($img1, "", 0, 6);

        $img2= $req->file('img2')->store('public');
        $img2= "storage" . substr_replace($img2, "", 0, 6);

        $img3= $req->file('img3')->store('public');
        $img3= "storage" . substr_replace($img3, "", 0, 6);

        $img4= $req->file('img4')->store('public');
        $img4= "storage" . substr_replace($img4, "", 0, 6);

        $img5= $req->file('img5')->store('public');
        $img5= "storage" . substr_replace($img5, "", 0, 6);



        $product= Product::where('id',$req->sr);

        
        $product->img1=$img1;
        $product->img2=$img2;
        $product->img3=$img3;
        $product->img4=$img4;
        $product->img5=$img5;

        $product->save();

        if ($product) {
            
            return redirect('editproducts')->with("success","Updated Successfully");

        }else {
            return redirect('editproducts')->with("fail","Something Went Wrong");
        }


    }









}
