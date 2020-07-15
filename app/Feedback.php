<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    protected $table = 'feedback';

    protected $primarykey = 'id';

    public $timestamp = false;

    public function feedbackOnCustomer(){
        return $this->belongsTo('App\Customer','cust_id','fb_id');
    }
}
