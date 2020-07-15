<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    protected $primarykey = 'id';

    public $timestamp = false;

    public function productOnProductType()
    {
        return $this->belongsTo('App\ProductType','productType_id','product_id');
    }

    public function commentOnProduct()
    {
        return $this->hasMany('App\Comment','product_id','product_id');
    }

    public function orderDetailOnProduct()
    {
        return $this->hasMany('App\OrderDetail','product_id','product_id');
    }

}
