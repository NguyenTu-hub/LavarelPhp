<?php

namespace App\Http\Controllers;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();
use Illuminate\Http\Request;

class ProductController extends Controller
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
    public function add_product()
    {
        $this->AuthenLogin();
        $cate_product=DB::table('tbl_category_product')->orderby('category_id','desc')->get();
        $brand_product=DB::table('tbl_Brand')->orderby('Brand_id','desc')->get();
        return view('admin.add_product')->with('cate_product',$cate_product)->with('brand_product',$brand_product);
    }
    public function all_product()
    {
        $this->AuthenLogin();
        $all_product= DB::table('tbl_product')
        ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.Catergory_id')
        ->join('tbl_Brand','tbl_Brand.Brand_id','=','tbl_product.Brand_id')
        ->orderby('tbl_product.Product_id','desc')->get();
        $manager_product=view('admin.all_product')->with('all_product',$all_product);
        return view('admin_layout')->with('admin.all_product',$manager_product);
    }
    public function save_product(Request $request)
    {
        $this->AuthenLogin();
        $data=array();
        $data['Product_name']=$request->product_name;
        $data['Product_price']=$request->product_price;
        $data['Product_desc']=$request->Description;
        $data['Product_content']=$request->content;
        $data['Brand_id']=$request->product_brand;
        $data['Catergory_id']=$request->product_category;
        $data['Product_status']=$request->product_status;
        $get_img=$request->file('product_image');

        if($get_img)
        {
            $get_name_img=$get_img->getClientOriginalName();

            $name_img=current(explode('.',$get_name_img));
            $new_img=$name_img.rand(0,99).'.'.$get_img->getClientOriginalExtension();
            $get_img->move('public/upload/products',$new_img);
            $data['Product_image']=$new_img;
            DB::table('tbl_product')->insert($data);
            Session::put('message','Success!');
            return Redirect::to('addProduct');
        }
        $data['Product_image']='';
        DB::table('tbl_product')->insert($data);
        Session::put('message','Success without image!');
        return Redirect::to('addProduct');
    }
    public function unactive_product($Product_id)
    {
        DB::table('tbl_product')->where('Product_id',$Product_id)->update(['Product_status'=>1]);
        return Redirect::to('listProduct');
    }
     public function active_product($Product_id)
    {
        DB::table('tbl_product')->where('Product_id',$Product_id)->update(['Product_status'=>0]);
        return Redirect::to('listProduct');
    }
    public function edit_product($product_id)
    {
        $this->AuthenLogin();
        $cate_product=DB::table('tbl_category_product')->orderby('category_id','desc')->get();
        $brand_product=DB::table('tbl_Brand')->orderby('Brand_id','desc')->get();
        $edit_product= DB::table('tbl_product')->where('Product_id',$product_id)->get();
        $manager_product=view('admin.edit_product')->with('edit_product',$edit_product)->with('cate_product',$cate_product)->with('brand_product',$brand_product);
        return view('admin_layout')->with('admin.edit_product',$manager_product);
    }
    public function update_product(Request $request,$Product_id)
    {
        $this->AuthenLogin();
        $data=array();
         $data['Product_name']=$request->product_name;
        $data['Product_price']=$request->product_price;
        $data['Product_desc']=$request->Description;
        $data['Product_content']=$request->content;
        $data['Brand_id']=$request->product_brand;
        $data['Catergory_id']=$request->product_category;
        $data['Product_status']=$request->product_status;
        $get_img=$request->file('product_image');
         if($get_img)
        {
            $get_name_img=$get_img->getClientOriginalName();

            $name_img=current(explode('.',$get_name_img));
            $new_img=$name_img.rand(0,99).'.'.$get_img->getClientOriginalExtension();
            $get_img->move('public/upload/products',$new_img);
            $data['Product_image']=$new_img;
            DB::table('tbl_product')->where('Product_id',$Product_id)->update($data);
            Session::put('message','Success!');
            return Redirect::to('listProduct');
        }
        DB::table('tbl_product')->where('Product_id',$Product_id)->update($data);
        Session::put('message','Success without image!');
        return Redirect::to('listProduct');

    }

     public function delete_product($Product_id)
    {
        $this->AuthenLogin();
        DB::table('tbl_product')->where('Product_id',$Product_id)->delete();
        Session::put('message','Deleted Success!');
        return Redirect::to('listProduct');
    }
    //end function admin
    public function detail_product($product_id)
    {
        $cate_product=DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get();
        $brand_product=DB::table('tbl_Brand')->where('Brand_status','0')->orderby('Brand_id','desc')->get();
        $detail_product=DB::table('tbl_product')
        ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.Catergory_id')
        ->join('tbl_Brand','tbl_Brand.Brand_id','=','tbl_product.Brand_id')
        ->where('tbl_product.Product_id',$product_id)->get(); 
        $Brand_id="";
        foreach($detail_product as $key=>$value)
        {
            $Brand_id=$value->Brand_id;
        }

        $related_products=DB::table('tbl_product')
        ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.Catergory_id')
        ->join('tbl_Brand','tbl_Brand.Brand_id','=','tbl_product.Brand_id')
        ->where('tbl_Brand.Brand_id',$Brand_id)->limit(3)->get(); 
        return view('Pages.products.show_detail')
        ->with('category',$cate_product)
        ->with('Brand',$brand_product)
        ->with('pro',$detail_product)
        ->with('related',$related_products);
    }
}
