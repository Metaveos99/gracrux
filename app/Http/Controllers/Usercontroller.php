<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

use Illuminate\Support\Facades\Hash;

class Usercontroller extends Controller
{
    
    function updatepass(Request $req){


        $user = User::find(1);

        if ( Hash::check($req->currentpassword, $user->password ) ) {

            if ($req->newpassword === $req->confirmpassword) {
                $user->password= Hash::make($req->newpassword);
                $user->save();
                return redirect('adminupdatepassword')->with('success', "Password Reset Successfull");

            }else {
                return redirect('adminupdatepassword')->with('match', "Password Do Not Match");
            }
            

        }else {
            return redirect('adminupdatepassword')->with('wrong', "Wrong Password");
        }



    }



    function updaterpro(Request $req){


        $user = User::find(1);

        $user->name = $req->firstname." ".$req->lastname;
        $user->email = $req->email;
        $user->mobile = $req->phone;

        $user->save();


        return redirect('adminprofile')->with('success', 'Updated Successfully');


    }



}
