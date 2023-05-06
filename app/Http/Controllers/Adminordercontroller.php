<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Order;

use App\Models\Orderdetail;

use App\Models\Transaction;


class Adminordercontroller extends Controller
{
    
    function show(){


        $orders = Orderdetail::where('status',"Ordered")->orWhere('status',"Shipped")->orWhere('status',"In Transit")->orWhere('status',"Out For Delivery")->get();

        return view('admins.orders',['data'=>$orders]);


    }

    function canshow(){


        $orders = Orderdetail::where('status',"Cancelled")->get();

        return view('admins.cancelledorders',['data'=>$orders]);


    }



    function deliveredshow(){


        $orders = Orderdetail::where('status',"Delivered")->get();

        return view('admins.completedorders',['data'=>$orders]);


    }


    function transactions(){


        $orders = Transaction::get();

        return view('admins.transactions',['data'=>$orders]);


    }




    function aja(Request $req){


        $details = Order::where('order_id', $req->datas)->first();

        return $details;

    }


    function dstatus(Request $req){


        $details = Orderdetail::where('order_id', $req->datas)->first();

        return $details;

    }


    function pstatus(Request $req){


        $details = Orderdetail::where('order_id', $req->datas)->first();

        return $details;

    }



    function updstatus(Request $req){

        $details = Orderdetail::where('order_id', $req->sr)->get();

        $ords = Order::where('order_id', $req->sr)->get();

        $date = date('Y-m-d');

        if ($req->status=='Cancelled') {


            foreach ($details as  $detail) {
                
                $detail->status = $req->status;
                $detail->payment_status = "Refund Pending";
                $detail->cancel_date = $date;
        
                $detail->save();
    
            }
    
            foreach ($ords as  $ord) {
                
                $ord->Status = $req->status;
        
                $ord->save();
    
            }


           
        }elseif ($req->status=='Delivered') {
           

            
            foreach ($details as  $detail) {
                
                $detail->status = $req->status;
                
                $detail->delivery_date = $date;
        
                $detail->save();
    
            }
    
            foreach ($ords as  $ord) {
                
                $ord->Status = $req->status;
        
                $ord->save();
    
            }

            

        }else {
            
            foreach ($details as  $detail) {
                
                $detail->status = $req->status;
        
                $detail->save();
    
            }
    
            foreach ($ords as  $ord) {
                
                $ord->Status = $req->status;
        
                $ord->save();
    
            }
    
    
    
        }
        
        
        
        return redirect('adminorders')->with('message',"Status Updated Successfully");
        


    }


    function uppaystatus(Request $req){

        $details = Orderdetail::where('order_id', $req->sr)->get();

        foreach ($details as  $detail) {
                
            $detail->payment_status = $req->status;
    
            $detail->save();

        }



        return redirect('admincancelorders')->with('message',"Status Updated Successfully");

    }



}
