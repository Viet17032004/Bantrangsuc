<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BinhLuanController;
use App\Http\Controllers\Admin\ChucVuController;
use App\Http\Controllers\Admin\DanhMucController;
use App\Http\Controllers\Admin\DonHangController;
use App\Http\Controllers\Admin\SanPhamController;
use App\Http\Controllers\Admin\TaiKhoanController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\Clients\HomeController;
use App\Http\Controllers\DanhMucSanPhamController;
use App\Http\Controllers\OderController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('admins.taikhoans.detail');
// });
// Route::get('/home', function () {
//     return view('admins.danhmucs.index');
// });

Route::get('login',[AuthController::class,'showFormLogin']);
Route::post('login',[AuthController::class,'login'])->name('login');
Route::post('/comment/{san_pham_id}',[AuthController::class,'post_comment'])->name('home.comment');
Route::get('register',[AuthController::class,'showFormRegister']);
Route::post('register',[AuthController::class,'register'])->name('register');
Route::post('logout',[AuthController::class,'logout'])->name('logout');

  //Route Tài Khoản 
  Route::middleware('auth')->prefix('donhangs')
  ->as('donhangs.')
  ->group(function (){
      Route::get('/',[OrderController::class,'index'])->name('index');
      Route::get('/create',[OrderController::class,'create'])->name('create');
      Route::post('/store',[OrderController::class,'store'])->name('store');
      Route::get('/show/{id}',[OrderController::class,'show'])->name('show');
      Route::put('{id}/update',[OrderController::class,'update'])->name('update');
       });

//Route admin
Route::middleware(['auth','auth.admin'])->prefix('admins')
->as('admins.')
->group(function (){

    Route::get('/dashboard',[AdminController::class,'index'])->name('dashboard');

    //Route Danh Mục
    Route::prefix('danhmucs')
    ->as('danhmucs.')
    ->group(function (){
        Route::get('/',[DanhMucController::class,'index'])->name('index');
        Route::get('/create',[DanhMucController::class,'create'])->name('create');
        Route::post('/store',[DanhMucController::class,'store'])->name('store');
        Route::get('/show/{id}',[DanhMucController::class,'show'])->name('show');
        Route::get('{id}/edit',[DanhMucController::class,'edit'])->name('edit');
        Route::put('{id}/update',[DanhMucController::class,'update'])->name('update');
        Route::delete('{id}/destroy',[DanhMucController::class,'destroy'])->name('destroy');
        
    
         });
        


         //Route Sản Phẩm 
         Route::prefix('sanphams')
         ->as('sanphams.')
         ->group(function (){
             Route::get('/',[SanPhamController::class,'index'])->name('index');
             Route::get('/create',[SanPhamController::class,'create'])->name('create');
             Route::post('/store',[SanPhamController::class,'store'])->name('store');
             Route::get('/show/{id}',[SanPhamController::class,'show'])->name('show');
             Route::get('{id}/edit',[SanPhamController::class,'edit'])->name('edit');
             Route::put('{id}/update',[SanPhamController::class,'update'])->name('update');
             Route::delete('{id}/destroy',[SanPhamController::class,'destroy'])->name('destroy');
              });
       //Route Tài Khoản 
       Route::prefix('taikhoans')
       ->as('taikhoans.')
       ->group(function (){
           Route::get('/',[TaiKhoanController::class,'index'])->name('index');
           Route::get('/create',[TaiKhoanController::class,'create'])->name('create');
           Route::post('/store',[TaiKhoanController::class,'store'])->name('store');
           Route::get('/show/{id}',[TaiKhoanController::class,'show'])->name('show');
           Route::get('{id}/edit',[TaiKhoanController::class,'edit'])->name('edit');
           Route::put('{id}/update',[TaiKhoanController::class,'update'])->name('update');
           Route::delete('{id}/destroy',[TaiKhoanController::class,'destroy'])->name('destroy');
            });
             //Route Tài Khoản 
       Route::prefix('chucvus')
       ->as('chucvus.')
       ->group(function (){
           Route::get('/',[ChucVuController::class,'index'])->name('index');
           Route::get('/create',[ChucVuController::class,'create'])->name('create');
           Route::post('/store',[ChucVuController::class,'store'])->name('store');
           Route::get('/show/{id}',[ChucVuController::class,'show'])->name('show');
           Route::get('{id}/edit',[ChucVuController::class,'edit'])->name('edit');
           Route::put('{id}/update',[ChucVuController::class,'update'])->name('update');
           Route::delete('{id}/destroy',[ChucVuController::class,'destroy'])->name('destroy');
            });
            //Route Bình Luận 
       Route::prefix('binhluans')
       ->as('binhluans.')
       ->group(function (){
           Route::get('/',[BinhLuanController::class,'index'])->name('index');
           Route::get('/create',[BinhLuanController::class,'create'])->name('create');
           Route::post('/store',[BinhLuanController::class,'store'])->name('store');
           Route::get('/show/{id}',[BinhLuanController::class,'show'])->name('show');
           Route::get('{id}/edit',[BinhLuanController::class,'edit'])->name('edit');
           Route::put('{id}/update',[BinhLuanController::class,'update'])->name('update');
           Route::delete('{id}/destroy',[BinhLuanController::class,'destroy'])->name('destroy');
            });
              //Route Đơn Hàng
       Route::prefix('donhangs')
       ->as('donhangs.')
       ->group(function (){
           Route::get('/',[DonHangController::class,'index'])->name('index');
           Route::get('/create',[DonHangController::class,'create'])->name('create');
           Route::post('/store',[DonHangController::class,'store'])->name('store');
           Route::get('/show/{id}',[DonHangController::class,'show'])->name('show');
           Route::get('{id}/edit',[DonHangController::class,'edit'])->name('edit');
           Route::put('{id}/update',[DonHangController::class,'update'])->name('update');
           Route::delete('{id}/destroy',[DonHangController::class,'destroy'])->name('destroy');
            });
            
     });

// Auth::routes();
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/product/detail/{id}',[ProductController::class,'chiTietSanPham'])->name('products.detail');
Route::get('/product/show/{id}',[DanhMucSanPhamController::class,'index'])->name('categories.show');
Route::get('/list-card',[CartController::class,'listCart'])->name('cart.list');
Route::post('/add-to-card',[CartController::class,'addCart'])->name('cart.add');
Route::post('/update-card',[CartController::class,'updateCart'])->name('cart.update');
// Route::middleware(['auth.checkadmin'])->group(function () {
    // Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    //  });
 
