<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;
use App\Models\Province;
use App\Models\Wards;
use App\Models\Freeship;
class DeliveryController extends Controller
{
    public function delivery(Request $request)
    {
        $city=City::orderby('matp','ASC')->get();
        return view('admin.add_delivery')->with(compact('city'));
    }
    public function select_delivery(Request $request)
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
    public function insert_delivery(Request $request)
    {
        $data=$request->all();
        $feeship=new Freeship();
        $feeship->fee_matp=$data['city'];
        $feeship->fee_maqh=$data['province'];
        $feeship->fee_xaid=$data['wards'];
        $feeship->fee_feeship=$data['feeship'];
        $feeship->save();
    }
}
