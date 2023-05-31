<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\customer;

use Illuminate\Support\Facades\Hash;

class Clientcontroller extends Controller
{

    function register(Request $req){

        $req->validate([

            'email'=>"unique:customers,email",
            'number'=>"unique:customers,number",

        ]);

        $tok = rand(100000,1000000);
        
        $client= new customer;

        $client->name=$req->username;
        $client->email=$req->email;
        $client->number=$req->number;
        $client->password= Hash::make($req->password);
        $client->status=1;
        $client->token=$tok;
        $client->country="NA";
        $client->state="NA";
        $client->city="NA";
        $client->zip="NA";
        $client->address="NA";

        $client->save();


        if ($client) {

            session()->put('userid',$client->email);
            session()->put('useridname',$client->name);
            
            return redirect('/');

        }else {
            return redirect('/user-register')->with("wrong", "Something Went Wrong Please Try Again");
        }


    }


    function out(){


        if (session('userid')) {
            
            session()->pull('userid');
            session()->pull('useridname');
            return redirect('/');
        }else {
            return redirect('/');
        }

    }


    function log(Request $req){

        $client= customer::where('email',$req->email)->first();

        if ($client) {

            if (Hash::check($req->password, $client->password)) {

                session()->put('userid',$client->email);
                session()->put('useridname',$client->name);
                
                return redirect('/');
            }else {
                return redirect('user-login')->with('wrongpass',"Wrong Password");
            }

        }else {
            return redirect('user-login')->with('wrong',"User Does Not Exist");
        }

        

    }



    
}
