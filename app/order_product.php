<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class order_product extends Model
{
    //
    protected $table = "order_product";

    public function order()
    {
        return $this->belongsTo('App\order', 'order_id', 'id');

    }

    public function product()
    {
        return $this->hasMany('App\product', 'product_id', 'id');
    }
}
