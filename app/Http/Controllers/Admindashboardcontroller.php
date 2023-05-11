<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Orderdetail;
use App\Models\Transaction;
use App\Models\customer;
use App\Models\Product;

class Admindashboardcontroller extends Controller
{
    
    function index(){

        $us = User::find(1)->first();
        $user = $us->name;

        $to_or = Orderdetail::count('id');

        $to_rev = Transaction::sum('amount');

        $to_cs = customer::count('id');

        $to_p = Product::count('id');

        $all_tr = Transaction::limit(6)->orderBy('id','desc')->get();

        return view('admins.index',["user"=>$user,"tor"=>$to_or,"tr"=>$to_rev,"tc"=>$to_cs,"tp"=>$to_p,"atr"=>$all_tr]);

    }


    function users(){

        $clients = customer::get();

        return view('admins.users',["users"=>$clients]);


    }


}
