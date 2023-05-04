<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Usercontroller;
use App\Http\Controllers\Productcontroller;
use App\Http\Controllers\Webcontroller;
use App\Http\Controllers\Clientcontroller;
use App\Http\Controllers\Cartcontroller;
use App\Http\Controllers\Ordercontroller;

use App\Http\Middleware\checklogin;
use App\Http\Middleware\restrict;



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
Route::get('search', [Webcontroller::class,'search'])->name('search');

Route::post('userreg', [Clientcontroller::class,'register'])->name('reg');
Route::post('log', [Clientcontroller::class,'log'])->name('log');

Route::get('logoutuser', [Clientcontroller::class,'out'])->name('out');


Route::post('addtocart', [Cartcontroller::class,'add']);

Route::get('cart', [Cartcontroller::class,'cart']);

Route::post('remove', [Cartcontroller::class,'remove']);

Route::post('cartupdate', [Cartcontroller::class,'update']);




Route::get('/user-register', function () {
    return view('userregister');
})->middleware('check');

Route::get('/user-login', function () {
    return view('userlogin');
})->middleware('check');




Route::get('/checkout', [Ordercontroller::class,'check'])->middleware('restrict');




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
