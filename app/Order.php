<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    protected $table = "order";

    public function users()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

    public function oder_product()
    {
        return $this->hasMany('App\Oder_product', 'order_id', 'id');
    }

    public function bill()
    {
        return $this->hasMany('App\Bill', 'id_order', 'id');
    }

    public function product()
    {
        return $this->hasManyThrough('App\Product', 'App\Order', 'order_id', 'product_id', 'id');
    }

}
