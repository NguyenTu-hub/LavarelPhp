<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();
class CategoryProduct extends Controller
{
    public function add_category()
    {
        return view('admin.add_category_product');
    }
    public function all_category()
    {
        $all_category_product= DB::table('tbl_category_product')->get();
        $manager_category_product=view('admin.all_category_product')->with('all_category_product',$all_category_product);
        return view('admin_layout')->with('admin.all_category_product',$manager_category_product);
    }
    public function save_category_product(Request $request)
    {
        $data=array();
        $data['category_name']=$request->catergory_product_name;
        $data['category_desc']=$request->Description;
        $data['category_status']=$request->category_product_status;
        DB::table('tbl_category_product')->insert($data);
        Session::put('message','Success!');
        return Redirect::to('addCategory');
    }
    public function unactive($category_id)
    {
        DB::table('tbl_category_product')->where('category_id',$category_id)->update(['category_status'=>1]);
        return Redirect::to('listCategory');
    }
     public function active($category_id)
    {
        DB::table('tbl_category_product')->where('category_id',$category_id)->update(['category_status'=>0]);
        return Redirect::to('listCategory');
    }
    public function edit_category($category_id)
    {
        $edit_category_product= DB::table('tbl_category_product')->where('category_id',$category_id)->get();
        $manager_category_product=view('admin.edit_category_product')->with('edit_category_product',$edit_category_product);
        return view('admin_layout')->with('admin.all_category_product',$manager_category_product);
    }
    public function update_category_product(Request $request,$category_id)
    {
        $data=array();
        $data['category_name']=$request->catergory_product_name;
        $data['category_desc']=$request->Description;
        DB::table('tbl_category_product')->where('category_id',$category_id)->update($data);
        Session::put('message','Success!');
        return Redirect::to('listCategory');

    }

     public function delete_category($category_id)
    {
        DB::table('tbl_category_product')->where('category_id',$category_id)->delete();
        Session::put('message','Deleted Success!');
        return Redirect::to('listCategory');
    }


}
