<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order_product extends Model
{
    //
    protected $table = "order_product";

    public function order()
    {
        return $this->belongsTo('App\Order', 'order_id', 'id');

    }

    public function product()
    {
        return $this->hasMany('App\Product', 'product_id', 'id');
    }
}
