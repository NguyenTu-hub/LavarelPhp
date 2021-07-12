<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();
class loginController extends Controller
{
    public function index()
    {
        return view('admin_login');
    }
    public function  showdashboard()
    {
        return view('admin.dashboard');
    }
    public function dashboard(Request $request)
    {
        $email=$request->Email;
        $password=md5($request->Password);
        $result=DB::table('tbl_user')->where('Email',$email)->where('Password',$password)->first();
        if($result!=null){
            Session::put('admin_name',$result->Name);
            Session::put('admin_id',$result->id);
           return view('admin.dashboard');

        }
        else{
            Session::put('message','Email or Password is not correct');
            return Redirect::to('/login');
        }
    }
     public function logout(Request $request)
    {
                Session::put('admin_name',null);
                Session::put('admin_id',null);
                return Redirect::to('/login');
    }
}
