<?php

namespace App\Http\Controllers;
use DB;
use App\Http\Requests;
use Session;
use Cart;
use App\Models\City;
use App\Models\Province;
use App\Models\Wards;
use App\Models\Freeship;
use App\Models\order;
use App\Models\orderDetail;
use App\Models\shipping;
use Illuminate\Support\Facades\Redirect;
session_start();
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
     public function AuthenLogin()
    {
        $admin_id=Session::get('admin_id');
        if($admin_id)
        {
            redirect::to('admin.dashboard');
        }
        else
        {
            redirect::to('login')->send();
        }
    }
    public function show_order(Request $request)
    {
        $method='';
        $data=$request->all();
        if(Session::get('Info'))
        {
             $request->session()->forget('Info');
        }
       
        if($data['shipping_method']==0)
            {
                $method='PayPal';
            }
            else
            {
                $method='Payment';
            }
            $InfoShipping[]=array(
                'shipping_name'=>$data['shipping_name'],
                'shipping_email'=>$data['shipping_email'],
                'shipping_phone'=>$data['shipping_phone'],
                 'shipping_address'=>$data['shipping_address'],
                'shipping_note'=>$data['shipping_note'],
                'shipping_method'=>$method,
                 'order_fee'=>$data['order_fee'],
            );
            Session::put('Info',$InfoShipping);
            Session::save();

            $output='        
                            <form>
                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                            <div class="form-group">';
                            foreach(Session::get('Info') as $key)
                            {
                            $output.='
                            <input type="text" class="form-control shipping_email1" id="message-text" value="'.$key['shipping_email'].'" disabled>
                            </div>
                            <div class="form-group">
                            <input type="text" class="form-control shipping_name1" id="message-text" value="'.$key['shipping_name'].'" disabled>
                            </div>
                            <div class="form-group">';
                            foreach(Session::get('address') as $add)
                            {
                                $output.='<input type="text" class="form-control shipping_address1" id="message-text" value="'.$key['shipping_address'].",".$add['xaphuong'].",".$add['quanhuyen'].",".$add['thanhpho'].'"disabled> ';
                            }
                            $output.='
                            </div>
                            <div class="form-group">
                            <input type="text" class="form-control payment_select1" id="message-text" value="'.$method.'" disabled>
                            </div> 

                            <div class="form-group">
                            <input type="text" class="form-control shipping_phone1" id="message-text" value="'.$key['shipping_phone'].'" disabled>
                            </div> 
                            ';
                               }
                               $total=0;
                               $output.='<p>Orders placed</p>';
                               foreach(Session::get('cart') as $cart)
                               {
                                $subtotal=$cart['product_price']*$cart['product_qty'];
                                $total+=$subtotal;
                                 $output.=' 
                            
                            <div class="form-group">
                            <label for="message-text" class="col-form-label">'.$cart['product_name'].": x ".$cart['product_qty'].'</label>
                            </div> ';}
                            $total=$total+Session::get('fee');
                             $output.='
                             <div class="form-group">
                            <label for="message-text" class="col-form-label">FeeShip:'.Session::get('fee').'</label>
                            </div>
                             <div class="form-group">
                            <label for="message-text" class="col-form-label">Total Price:'.$total.'</label>
                            </div>
                            </form>';
             echo $output;
        
    }
    public function confirm_order(Request $request)
    {
         $data=$request->all();
         $shipping=new shipping();
         $shipping->shipping_name=$data['shipping_name'];
         $shipping->shipping_email=$data['shipping_email'];
         $shipping->shipping_phone=$data['shipping_phone'];
         $shipping->shipping_address=$data['shipping_address'];
         $shipping->shipping_note=$data['shipping_note'];
         $shipping->shipping_method=$data['shipping_method'];
         $shipping->save();
         $shipping_id=$shipping->shipping_id;
         
         
         
         $checkout_code=substr(md5(microtime()), rand(0,26),5);
         $order=new order();
         $order->customer_id=Session::get('customer_id');
         $order->shipping_id=$shipping_id;
         $order->order_status=1;
         $order->order_code=$checkout_code;
         date_default_timezone_set('Asia/Ho_Chi_Minh');
         $order->created_at=now();
         $order->save();

        
         if(Session::get('cart'))
         {
            foreach(Session::get('cart') as $key=>$cart)
            {
                 $order_detail=new orderDetail();
                $order_detail->order_code=$checkout_code;
                $order_detail->product_id=$cart['product_id'];
                $order_detail->product_price=$cart['product_price'];
                $order_detail->product_name=$cart['product_name'];
                $order_detail->Product_sale_quantity=$cart['product_qty'];
                $order_detail->product_fee=$data['order_fee'];
                $order_detail->save();
                
            }
         }
         $request->session()->forget('cart');

    }
    public function caculate_fee(Request $request)
    {
       $data=$request->all();
      
       if($data['matp'])
       {
        $feeship=Freeship::where('fee_matp',$data['matp'])->where('fee_maqh',$data['maqh'])->where('fee_xaid',$data['xaid'])->get();
        
        $count=$feeship->count();
        if($count>0)
        {
            foreach($feeship as $key=>$fee)
             {
                 $address[]=array(
                'xaphuong'=>$fee->wards->name_xaphuong,
                'quanhuyen'=>$fee->Province->name_quanhuyen,
                'thanhpho'=>$fee->City->name_city,
                                );
                 $request->session()->forget('address');
                 Session::put('address',$address);
                 Session::save();
                Session::put('fee',$fee->fee_feeship);
                Session::save();
             }
        }else
        {
            Session::put('fee',20000);
            Session::save();
        }

        
       } 
    }
    public function select_delivery_home(Request $request)
    {
         $data=$request->all();
        if($data['action'])
        {
             $output="";
            if($data['action']=="city"){
                $select_province=Province::where('matp',$data['matp'])->orderby('maqh','ASC')->get();
                $output.='<option>---Choose a province---</option>';
                foreach($select_province as $key=>$province){
                $output.='<option value="'.$province->maqh.'">'.$province->name_quanhuyen.'</option>';
                }
            }
            else {
                   $select_wards=Wards::where('maqh',$data['matp'])->orderby('xaid','ASC')->get();
                   $output.='<option>---Choose a Ward---</option>';
                foreach($select_wards as $key=>$ward){
                $output.='<option value="'.$ward->xaid.'">'.$ward->name_xaphuong.'</option>';
                }
               }   
        }
        echo $output;
    }
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
              $city=City::orderby('matp','ASC')->get();
        return view('Pages.Checkout.checkout')->with('category',$cate_product)->with('Brand',$brand_product)->with('city',$city);
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
            return view('Pages.checkout.payment')->with('category',$cate_product)->with('Brand',$brand_product);
        
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
       else if($data['payment_method']==2)
        {
            Cart::destroy();
             $cate_product=DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get();
            $brand_product=DB::table('tbl_Brand')->where('Brand_status','0')->orderby('Brand_id','desc')->get();
            return view('Pages.checkout.hand_cash')->with('category',$cate_product)->with('Brand',$brand_product);
        }
        else
        {
            Cart::destroy();
             $cate_product=DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get();
            $brand_product=DB::table('tbl_Brand')->where('Brand_status','0')->orderby('Brand_id','desc')->get();
            return view('Pages.checkout.hand_cash')->with('category',$cate_product)->with('Brand',$brand_product);
        }
       
    }
    public function manage_order()
    {
         $this->AuthenLogin();
        $all_order= DB::table('tbl_order')
        ->join('tbl_customers','tbl_order.customer_id','=','tbl_customers.customer_id')
        ->select('tbl_order.*','tbl_customers.customer_name')
        ->orderby('tbl_order.order_id','desc')->get();
        $manager_order=view('admin.manage_order')->with('all_order',$all_order);
        return view('admin_layout')->with('admin.manage_order',$manager_order);
    }
    public function view_order($orderID){
        $this->AuthenLogin();
        $order_by_id= DB::table('tbl_order')
        ->join('tbl_customers','tbl_order.customer_id','=','tbl_customers.customer_id')
        ->join('tbl_shipping','tbl_order.shipping_id','=','tbl_shipping.shipping_id')
        ->join('tbl_order_detail','tbl_order.order_id','=','tbl_order_detail.order_id')
        ->select('tbl_order.*','tbl_customers.*','tbl_shipping.*','tbl_order_detail.*')->first();
        $manager_order_by_id=view('admin.view_order')->with('order_by_id',$order_by_id);
        return view('admin_layout')->with('admin.view_order',$manager_order_by_id);
        
    }
}
