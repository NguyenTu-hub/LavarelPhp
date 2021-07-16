<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();
class HomeController extends Controller
{
        public function index()
        {
            $cate_product=DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get();
            $brand_product=DB::table('tbl_Brand')->where('Brand_status','0')->orderby('Brand_id','desc')->get();
            // $all_product= DB::table('tbl_product')
            //     ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.Catergory_id')
            //     ->join('tbl_Brand','tbl_Brand.Brand_id','=','tbl_product.Brand_id')
            //     ->orderby('tbl_product.Product_id','desc')->get();
            $all_product=DB::table('tbl_product')->where('Product_status','0')->orderby('product_id','desc')
            ->limit(4)->get();
        $manager_product=view('admin.all_product')->with('all_product',$all_product);
            return View('Pages.home')->with('category',$cate_product)->with('Brand',$brand_product)
                                    ->with('all_product',$all_product);
        }
}
