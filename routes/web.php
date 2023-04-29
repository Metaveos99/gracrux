<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Usercontroller;
use App\Http\Controllers\Productcontroller;
use App\Http\Controllers\Webcontroller;


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

Route::get('/',[Webcontroller::class,'dash']);

Route::get('/contact', function () {
    return view('contact');
});


Route::get('products/{price?}/{cat?}', [Webcontroller::class,'pros']);

Route::get('details/{name}', [Webcontroller::class,'detail']);
Route::get('product/{cat}', [Webcontroller::class,'category'])->name('uniq');





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
    Route::get('/editproducts',[Productcontroller::class,'proedit'] )->name('editproducts');
    Route::post('/profilephoto',[Usercontroller::class,'proupload'] )->name('profilephoto');
    Route::get('/new',[Productcontroller::class,'aja'] );
    Route::post('/uppro',[Productcontroller::class,'proup'] )->name('uppro');
    Route::post('/upproimg',[Productcontroller::class,'proupimg'] )->name('upproimg');


});
