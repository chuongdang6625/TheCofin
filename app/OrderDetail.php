<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $table = 'order_details';

    protected $primarykey = 'id';

    public $timestamp = false;

    public function orderDetailOnProduct(){
        return $this->belongsTo('App\Product','product_id','orderDetail_id');
    }

    public function orderDetailOnOrder(){
        return $this->belongsTo('App\Order','order_id','orderDetail_id');
    }
}
