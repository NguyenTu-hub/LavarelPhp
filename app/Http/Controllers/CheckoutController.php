<?php

namespace App\Http\Controllers;
use DB;
use App\Http\Requests;
use Session;
use Cart;

use Illuminate\Support\Facades\Redirect;
session_start();
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function login_checkout()
    {
         $cate_product=DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get();
            $brand_product=DB::table('tbl_Brand')->where('Brand_status','0')->orderby('Brand_id','desc')->get();
        return view('Pages.Checkout.login_checkout')->with('category',$cate_product)->with('Brand',$brand_product);
    }
    public  function add_customer(Request $request)
    {
        $data=array();
        $data['customer_name']=$request->customer_name;
        $data['customer_phone']=$request->customer_phone;
        $data['customer_email']=$request->customer_email;
        $data['customer_password']=md5($request->customer_password);
        $customer_id=DB::table('tbl_customers')->insertGetId($data);
        Session::put('customer_id',$customer_id);
        Session::put('customer_name',$request->customer_name);
        return Redirect('/checkout');

    }
    public function checkout()
    {
         $cate_product=DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get();
            $brand_product=DB::table('tbl_Brand')->where('Brand_status','0')->orderby('Brand_id','desc')->get();
        return view('Pages.Checkout.checkout')->with('category',$cate_product)->with('Brand',$brand_product);
    }
    public function save_checkout_customer(Request $request)
    {
         $data=array();
        $data['shipping_name']=$request->shipping_name;
        $data['shipping_phone']=$request->shipping_phone;
        $data['shipping_email']=$request->shipping_email;
        $data['shipping_note']=$request->shipping_note;
        $data['shipping_address']=$request->shipping_address;
        $shipping_id=DB::table('tbl_shipping')->insertGetId($data);
        Session::put('shipping_id',$shipping_id);
        return Redirect('/payment');
    }
    public function payment()
    {
         $cate_product=DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get();
            $brand_product=DB::table('tbl_Brand')->where('Brand_status','0')->orderby('Brand_id','desc')->get();
            return view('Pages.checkout.payment')->with('category',$cate_product)->with('Brand',$brand_product);;
        
    }
    public function logout_checkout()
    {
        Session::flush();
        return Redirect('login_checkout');
    }
    public function login_customer(Request $request)
    {
        $email=$request->email_accout;
        $password=md5($request->password_account);
        $result=DB::table('tbl_customers')->where('customer_email',$email)->where('customer_password',$password)->first();
        Session::put('customer_id',$result->customer_id);
        if($result)
        return Redirect('/checkout');
        else
            return Redirect('login_checkout');
    }
    public function order_place(Request $request)
    {
        // $content=Cart::content();
        // echo $content;

          $data=array();
        $data['payment_method']=$request->payment_options;
         $data['payment_status']='Đang chờ xử lý';
        $Payment_id=DB::table('tbl_payment')->insertGetId($data);
        //insert order
         $o_data=array();
        $o_data['customer_id']=Session::get('customer_id');
        $o_data['shipping_id']=Session::get('shipping_id');
        $o_data['paymentid']=$Payment_id;
        $o_data['order_total']=Cart::total();
         $o_data['order_status']='Đang chờ xử lý';
        $order_id=DB::table('tbl_order')->insertGetId($o_data);

        //insert order detail
        $o_data=array();
        $content=Cart::content();
        foreach ($content as $v_content) {
        $od_data['order_id']=$order_id;
        $od_data['product_id']=$v_content->id;
        $od_data['Product_name']=$v_content->name;
        $od_data['Product_sale_quantity']=$v_content->qty;
        $od_data['Product_price']=$v_content->price;; 
        DB::table('tbl_order_detail')->insert($od_data); 
        }
       if( $data['payment_method']==1)
       {
        echo'Thanh toán thẻ ATM';
       }
       else if($data['payment_method']==1)
        {
            echo'tiền mặt';
        }
        else
        {
            echo 'Paypal';
        }
       
    }
}
