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
            $all_product=DB::table('tbl_product')->where('Product_status','0')->orderby('product_id','desc')
            ->limit(3)->get();
        $manager_product=view('admin.all_product')->with('all_product',$all_product);
            return View('Pages.home')->with('category',$cate_product)->with('Brand',$brand_product)->with('all_product',$all_product);
        }

        public function search(Request $request)
        { 
            $keywords=$request->keyword_submit;

            $cate_product=DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get();
            $brand_product=DB::table('tbl_Brand')->where('Brand_status','0')->orderby('Brand_id','desc')->get();
             $search_product=DB::table('tbl_product')->where('Product_name','like','%'.$keywords.'%')->get();
            return View('Pages.products.search')->with('category',$cate_product)->with('Brand',$brand_product)->with('search_product',$search_product);
        }

}
