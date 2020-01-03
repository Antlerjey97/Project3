<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    public $timestamps = false;
    protected $table = "products";

    public function comment()
    {
        return $this->hasmany('App\Comment', 'product_id', 'id');
    }

    public function category()
    {
        return $this->belongsto('App\Category', 'id_category', 'id');

    }

    public function promotion()
    {
        return $this->belongsto('App\Promotion', 'id_promotion', 'id');

    }

    public function oder_product()
    {
        return $this->belongsTo('App\Oder_product', 'product_id', 'id');

    }

    public function bill()
    {
        return $this->belongsTo('App\Bill', 'id_product', 'id');
    }

    public function order()
    {
        return $this->hasManyThrough('App\Order', 'App\Product', 'order_id', 'product_id', 'id');
    }
}
