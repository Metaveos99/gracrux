<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Usercontroller;
use App\Http\Controllers\Productcontroller;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/products', function () {
    return view('product');
});


Route::get('/details', function () {
    return view('product-details');
});

Route::get('/cart', function () {
    return view('cart');
});

Route::get('/checkout', function () {
    return view('checkout');
});




Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/adminhome', function () {
        return view('admins.index');
    })->name('adminhome');
    
    Route::get('/adminupdatepassword', function () {
        return view('admins.updatepassword');
    })->name('adminupdatepassword');
    
    Route::get('/adminprofile', function () {
        return view('admins.profile');
    })->name('dashadminprofileboard');
    
    Route::get('/addproducts', function () {
        return view('admins.addproducts');
    })->name('addproducts');

    Route::post('/adminpassword',[Usercontroller::class,'updatepass'] )->name('updateadminpass');
    Route::post('/adprofileup',[Usercontroller::class,'updaterpro'] )->name('adprofileup');
    Route::post('/addproduct',[Productcontroller::class,'add'] )->name('add');
    Route::get('/allproducts',[Productcontroller::class,'display'] )->name('all');
    Route::get('/removeproduct',[Productcontroller::class,'delete'] )->name('del');
    Route::post('/deleteproduct',[Productcontroller::class,'prodelete'] )->name('delproduct');


});
