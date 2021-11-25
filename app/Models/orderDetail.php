<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class orderDetail extends Model
{
    public $timestamps=false;
    protected $fillable=['order_code','product_id','Product_name','Product_price','Product_sale_quantity','product_fee'];
    protected $primaryKey='order_detail_id';
    protected $table='tbl_order_detail';
      public function product()
    {
        return $this->belongsTo('App\Models\Product','product_id');
    }
}

