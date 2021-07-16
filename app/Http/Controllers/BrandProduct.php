<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class BrandProduct extends Controller
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
    public function add_brand()
    {
        $this->AuthenLogin();
        return view('admin.add_brand_product');
    }
    public function all_brand()
    {
        $this->AuthenLogin();
        $all_brand_product= DB::table('tbl_brand')->get();
        $manager_brand_product=view('admin.all_brand_product')->with('all_brand_product',$all_brand_product);
        return view('admin_layout')->with('admin.all_brand_product',$manager_brand_product);
    }
    public function save_brand_product(Request $request)
    {
        $data=array();
        $data['Brand_name']=$request->brand_product_name;
        $data['Brand_desc']=$request->Description;
        $data['Brand_status']=$request->brand_product_status;
        DB::table('tbl_brand')->insert($data);
        Session::put('message','Success!');
        return Redirect::to('addBrand');
    }
    public function unactive_brand($brand_id)
    {
        DB::table('tbl_Brand')->where('Brand_id',$brand_id)->update(['Brand_status'=>1]);
        return Redirect::to('listBrand');
    }
     public function active_brand($brand_id)
    {
        DB::table('tbl_Brand')->where('Brand_id',$brand_id)->update(['Brand_status'=>0]);
        return Redirect::to('listBrand');
    }
    public function edit_brand($brand_id)
    {
        $this->AuthenLogin();
        $edit_brand_product= DB::table('tbl_Brand')->where('Brand_id',$brand_id)->get();
        $manager_brand_product=view('admin.edit_brand_product')->with('edit_brand_product',$edit_brand_product);
        return view('admin_layout')->with('admin.all_brand_product',$manager_brand_product);
    }
    public function update_brand_product(Request $request,$brand_id)
    {
        $this->AuthenLogin();
        $data=array();
        $data['Brand_name']=$request->brand_product_name;
        $data['Brand_desc']=$request->Description;
        DB::table('tbl_Brand')->where('Brand_id',$brand_id)->update($data);
        Session::put('message','Success!');
        return Redirect::to('listBrand');

    }

     public function delete_brand($brand_id)
    {
        $this->AuthenLogin();
        DB::table('tbl_Brand')->where('Brand_id',$brand_id)->delete();
        Session::put('message','Deleted Success!');
        return Redirect::to('listBrand');
    }
    //end function admin
      public function showBrand_home($brand_id)
    {
          $cate_product=DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get();
            $brand_product=DB::table('tbl_Brand')->where('Brand_status','0')->orderby('Brand_id','desc')->get();
            $brand_name=DB::table('tbl_Brand')->where('Brand_id',$brand_id)->first();
         $Brand_by_id=DB::table('tbl_product')->join('tbl_Brand','tbl_product.Brand_id',
            '=','tbl_Brand.Brand_id')->where('tbl_product.Brand_id',$brand_id)->get();
        return view('Pages.Brand.show_brand_home')
        ->with('category',$cate_product)
        ->with('Brand',$brand_product)
        ->with('pro',$Brand_by_id)
        ->with('br',$brand_name);

    }
}
