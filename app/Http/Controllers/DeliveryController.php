<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;
use App\Models\Province;
use App\Models\Wards;
use App\Models\Freeship;
class DeliveryController extends Controller
{
    public function update_delivery(Request $request)
    {
        $data=$request->all();
        $feeship=Freeship::find($data['feeship_id']);
        $feeship_value=rtrim($data['value'],'.');
        $feeship->fee_feeship=$feeship_value;
        $feeship->save();
    }
    public function select_feeship()
    {
        $feeship=Freeship::orderby('fee_id','DESC')->get();
        $output='';
        $output.='<div  class="table-responsive">
                <table class="table table-bordered">
                    <thread>
                        <tr>
                            <th>City</th>
                            <th>Province</th>
                            <th>Ward</th>
                            <th>feeship</th>
                        </tr>
                    </thread>
                    <tbody>
                    ';
                        foreach($feeship as $key=>$fee){
                         $output.='    
                        <tr>
                            <td>'.$fee->City->name_city.'</td>
                            <td>'.$fee->Province->name_quanhuyen.'</td>
                            <td>'.$fee->wards->name_xaphuong.'</td>
                            <td contenteditable data-feeship_id="'.$fee->fee_id.'" class="feeship_edit">'.number_format($fee->fee_feeship,0,',','.').'</td>
                        </tr>';
                        }
                    $output.='</tbody>
                </table></div>
        ';
        echo $output;
    }
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
