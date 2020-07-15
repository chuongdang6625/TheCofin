<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';

    protected $primarykey = 'id';

    public $timestamp = false;

    public function commentOnProduct(){
        return $this->belongsTo('App\Product','product_id','cust_id');
    }

    public function commentOnCustomer(){
        return $this->belongsTo('App\Customer','cust_id','cment_id');
    }
}
