<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
     protected $fillable = [
         'product_code', 'product_name', 'category_id', 'supplier_id', 'product_place','product_route','buy_date','expire_date','buying_price','selling_price','product_image',
    ];
}