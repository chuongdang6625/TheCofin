<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customers';

    protected $primarykey = 'id';

    public $timestamp = false;
 
    public function commentOnCustomer(){
        return $this->hasMany('App\Comment','cust_id','cment_id');
    }
 
    public function orderOnCustomer(){
        return $this->hasMany('App\Order','id','cust_id');
    }
 
    public function feedbackOnCustomer(){
        return $this->hasMany('App\Feedback','cust_id','cust_id');
    }
}
