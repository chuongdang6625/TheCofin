<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductType extends Model
{
    protected $table = 'product_types';

    protected $primarykey = 'id';

    public $timestamp = false;

    public function productOnProductType(){
        return $this->hasMany('App\Product','productType_id','product_id');
    }

    public function getParent(){
        return $this->hasMany(ProductType::class,'parent_id','productType_id');
    }

}
