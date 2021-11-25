<?php

namespace App\Http\Controllers;
use App\Models\City;
use App\Models\Province;
use App\Models\Wards;
use App\Models\Freeship;
use App\Models\order;
use App\Models\orderDetail;
use App\Models\shipping;
use App\Models\Customer;
use PDF;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function print_order($checkout_code)
    {
        $pdf=\App::make('dompdf.wrapper');
        $pdf->loadHTML($this->print_order_convert($checkout_code));
        return $pdf->stream();
    }
    public function print_order_convert($checkout_code)
    {
         $order_detail=orderDetail::where('order_code',$checkout_code)->get();
        $order=order::where('order_code',$checkout_code)->get();
        foreach($order as $key)
        {
            $customer_id=$key->customer_id;
            $shipping_id=$key->shipping_id;
        }
        $customer=Customer::where('customer_id',$customer_id)->first();
        $shipping=shipping::where('shipping_id',$shipping_id)->first();
         $order_detail_product=orderDetail::with('Product')->where('order_code',$checkout_code)->get();
         $output='';
         $output.='<style>body{
            font-family: DejaVu Sans;
        }
        .table-styling{
            border:1px solid #000;
        }
        .table-styling tbody tr td{
            border:1px solid #000;
        }
        </style>
        <h1><center>WATCH STORE EL</center></h1>
        <p>Customer</p>
        <table class="table-styling">
                <thead>
                    <tr>
                        <th>Name Customer</th>
                        <th>Number phone</th>
                    </tr>
                </thead>
                <tbody>';
                
        $output.='      
                    <tr>
                        <td>'.$customer->customer_name.'</td>
                        <td>'.$customer->customer_phone.'</td>         
                    </tr>';
                

        $output.='              
                </tbody>
            
        </table>

        <p>Shipping</p>
            <table class="table-styling">
                <thead>
                    <tr>
                        <th>Shipping name</th>
                        <th>Address</th>
                        <th>phone</th>
                        <th>Notes</th>
                    </tr>
                </thead>
                <tbody>';
                
        $output.='      
                    <tr>
                        <td>'.$shipping->shipping_name.'</td>
                        <td>'.$shipping->shipping_address.'</td>
                        <td>'.$shipping->shipping_phone.'</td>
                        <td>'.$shipping->shipping_note.'</td>
                        
                    </tr>';
                

        $output.='              
                </tbody>
            
        </table>

        <p>Order</p>
            <table class="table-styling">
                <thead>
                    <tr>
                        <th>Product name</th>
                        <th>Feeship</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Total Price</th>
                    </tr>
                </thead>
                <tbody>';
            
                $total = 0;

                foreach($order_detail_product as $key => $product){

                    $subtotal = $product->Product_price*$product->Product_sale_quantity;
                    $total+=$subtotal;
        $output.='      
                    <tr>
                        <td>'.$product->Product_name.'</td>
                        <td>'.number_format($product->product_fee,0,',','.').'đ'.'</td>
                        <td>'.$product->Product_sale_quantity.'</td>
                        <td>'.number_format($product->Product_price,0,',','.').'đ'.'</td>
                        <td>'.number_format($subtotal,0,',','.').'đ'.'</td>
                        
                    </tr>';
                }
        $output.= '<tr>
                <td colspan="2">
                    <p>feeship: '.number_format($product->product_fee,0,',','.').'đ'.'</p>
                    <p>Pay: '.number_format($total+$product->product_fee,0,',','.').'đ'.'</p>
                </td>
        </tr>';
        $output.='              
                </tbody>
            
        </table>

        <p>Sign</p>
            <table>
                <thead>
                    <tr>
                        <th width="200px">Shop owner</th>
                        <th width="800px">Receiver</th>
                        
                    </tr>
                </thead>
                <tbody>';
                        
        $output.='              
                </tbody>
            
        </table>

        ';

         return $output;

    }
    public function manage_order()
    {
        $order=order::orderby('created_at','DESC')->get();

        return view('Admin.manage_order')->with(compact('order'));
    }
    public function view_order($order_code)
    {
        $order_detail=orderDetail::where('order_code',$order_code)->get();
        $order=order::where('order_code',$order_code)->get();
        foreach($order as $key)
        {
            $customer_id=$key->customer_id;
            $shipping_id=$key->shipping_id;
        }
        $customer=Customer::where('customer_id',$customer_id)->first();
        $shipping=shipping::where('shipping_id',$shipping_id)->first();

        $order_detail=orderDetail::with('Product')->where('order_code',$order_code)->get();
        return view('Admin.view_order')->with(compact('order_detail','customer','shipping'));
    }
}
