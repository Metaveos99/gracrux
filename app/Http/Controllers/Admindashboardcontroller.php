<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

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

       // Get the total amounts
        $total_amounts = array();

        $da = date('Y');

        foreach (range(1, 12) as $month) {
        $total_amounts[$month] = Transaction::where('payment_type', 'Credit')
            ->where('status', 'Successful')
            ->whereMonth('date', $month)
            ->whereYear('date', $da)
            ->sum('amount');
        }

    // Convert the PHP array to a JavaScript array
    $javascript_total_amounts = json_encode($total_amounts);



    $total_orders = array();

   

    foreach (range(1, 12) as $month) {
    $total_orders[$month] = Orderdetail::whereMonth('order_date', $month)
        ->whereYear('order_date', $da)
        ->count('id');
    }

// Convert the PHP array to a JavaScript array
$javascript_total_orders = json_encode($total_orders);




        $to_or = Orderdetail::count('id');

        $to_dor = Orderdetail::where('status','Delivered')->count('id');
        $to_cor = Orderdetail::where('status','Cancelled')->count('id');
        

        $to_rev = Transaction::sum('amount');

        $to_cs = customer::count('id');

        $to_p = Product::count('id');

        $all_tr = Transaction::limit(6)->orderBy('id','desc')->get();

        return view('admins.index',["user"=>$user,"tor"=>$to_or,"tr"=>$to_rev,"tc"=>$to_cs,"tp"=>$to_p,"atr"=>$all_tr,"tdr"=>$to_dor,"tcr"=>$to_cor,"res"=>$javascript_total_amounts,'res2'=>$javascript_total_orders]);

    }


    function users(){

        $clients = customer::get();

        return view('admins.users',["users"=>$clients]);


    }


}
