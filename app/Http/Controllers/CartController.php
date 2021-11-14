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
    public function add_cart_ajax(Request $request)
    {
        $data=$request->all();
        $session_id=substr(md5(microtime()),rand(0,26),5);
        $cart=Session::get('cart');
        print_r($data);
        // $request->session()->forget('cart');
        if($cart==true)
        {
            $is_available=0;
            foreach($cart as $key=>$val)
            {
                if($val['product_id']==$data['cart_product_id']){
                    $is_available++;
                }
            }
            if($is_available==0){
                $cart[]=array(
                'session_id'=>$session_id,
                'product_name'=>$data['cart_product_name'],
                'product_id'=>$data['cart_product_id'],
                'product_image'=>$data['cart_product_image'],
                'product_qty'=>$data['cart_product_qty'],
                'product_price'=>$data['cart_product_price'],
            );
                 Session::put('cart',$cart);
            }
        }else{
            $cart[]=array(
                'session_id'=>$session_id,
                'product_name'=>$data['cart_product_name'],
                'product_id'=>$data['cart_product_name'],
                'product_image'=>$data['cart_product_image'],
                'product_qty'=>$data['cart_product_qty'],
                'product_price'=>$data['cart_product_price'],
            );
            Session::put('cart',$cart);
        }
        
        Session::save();
    }
    public function show_cart_ajax()
    {

        $cate_product=DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get();
            $brand_product=DB::table('tbl_Brand')->where('Brand_status','0')->orderby('Brand_id','desc')->get();
        return view('Pages.Cart.cart_ajax')
        ->with('category',$cate_product)
        ->with('Brand',$brand_product);
    }
    public function update_cart_ajax(Request $request)
    {
     $data=$request->all();
     $cart=Session::get('cart');
     if($cart==true)
     {
        foreach($data['cart_quantity']as $key=>$quantity)
        {
            foreach($cart as $session=>$val)
            {
                if($val['session_id']==$key)
                {
                    $cart[$session]['product_qty']=$quantity;
                }
            }
        }
        Session::put('cart',$cart);
        return Redirect()->back()->with('message','Products is updated');
     }   
    }
    public function delete_sp($session_id)
    {
        $cart=Session::get('cart');
        if($cart==true)
        {
            foreach($cart as $key=>$val)
            {
                if($val['session_id']==$session_id)
                {
                    unset($cart[$key]);
                }
            }
            Session::put('cart',$cart);
            return Redirect()->back();
        }
    }
    // public function update_ajax(Request $request)
    // {
    //     $data= $request->all();
    //     $cart=Session::get('cart');
    //     if($cart==true)
    //     {
    //         foreach($cart as $session=>$val)
    //         {
    //             if($val['sesison_id']==$data['session_id'])
    //             {
    //                 $cart[$session]['product_qty']=$data['quantity'];
    //             }
    //         }
    //         Session::put('cart',$cart);
    //     }
    // }
}