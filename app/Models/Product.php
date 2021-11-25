<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
     public $timestamps=false;
    protected $fillable=['Product_name','Catergory_id','Brand_id','Product_desc','Product_content','Product_price','Product_image','Product_status'];
    protected $primaryKey='Product_id';
    protected $table='tbl_product';
}
