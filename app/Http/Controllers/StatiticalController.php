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
use DB;
use Carbon\CarbonPeriod;

class StatiticalController extends Controller
{
    public function index()
    {
        return view('Admin.statitical');
    }
    public function statitical(Request $request)
    {
        $data=$request->all();
        $fromdate=$data['from_date'];
        $todate=$data['to_date'];
        $oldate = date("Y-m-d", strtotime($fromdate));
        $newdate = date("Y-m-d", strtotime($todate));
        $get=db::table('tbl_order')->select('tbl_order.created_at','tbl_order_detail.Product_sale_quantity','tbl_order_detail.Product_price')->join('tbl_order_detail','tbl_order.order_code','=','tbl_order_detail.order_code')->whereBetween('tbl_order.created_at',[$oldate,$newdate])->orderby('tbl_order.created_at','ASC')->get();
        $period = $period = CarbonPeriod::create($oldate, $newdate);
           foreach($period as $dateP){
            $total=0;
                foreach($get as $value=>$key)
                {
                $createDate=new \DateTime($key->created_at);
                $script= $createDate->format('Y-m-d');
                $dateP->format('Y-m-d');
                if(strtotime($dateP)==strtotime($script))
                  {
                    $total+=$key->Product_sale_quantity*$key->Product_price;
                  }  
                    
                }
                  $chart_data[]=array(
                    'Times'=>$dateP->format('Y-m-d'),
                    'total'=>$total
                     );
             
            }
           echo $data=json_encode($chart_data);
    }
}
