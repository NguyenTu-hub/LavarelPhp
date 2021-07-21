<?php

namespace App\Http\Controllers;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();
use Illuminate\Http\Request;
use Cart;

class CartController extends Controller
{
    public function save_cart(Request $request){
        
        $product_id=$request->productid_hidden;
        $quantity=$request->qty;
        $product_info=DB::table('tbl_product')->where('product_id',$product_id)->first();
        // Cart::add('293ad', 'Product 1', 1, 9.99, 550);
       
        $data['id']=$product_id;
        $data['qty']=$quantity;
        $data['name']=$product_info->Product_name;
        $data['weight']='123';
        $data['price']=$product_info->Product_price;
        $data['options']['image']=$product_info->Product_image;
        Cart::add($data);
         // Cart::destroy();
        return Redirect::to('/show_cart');
    }
    public function show_cart()
    {
        $cate_product=DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get();
            $brand_product=DB::table('tbl_Brand')->where('Brand_status','0')->orderby('Brand_id','desc')->get();
        return view('Pages.Cart.show_cart')
        ->with('category',$cate_product)
        ->with('Brand',$brand_product);
    }
    public function delete($rowId)
    {
        Cart::update($rowId,0);
        return Redirect::to('/show_cart');

    }
    public function update(Request $request)
    {   $rowId=$request->rowId;
        $qty=$request->cart_quantity;
        Cart::update($rowId,$qty);
        return Redirect::to('/show_cart');
    }
}