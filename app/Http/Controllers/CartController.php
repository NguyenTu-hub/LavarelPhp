<?php

namespace App\Http\Controllers;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function save_cart(Request $request){
        $product_id=$request->productid_hidden;
        $quantity=$request->qty;
        $data=DB::table('tbl_product')->where('product_id',$product_id)->get();
    }
}