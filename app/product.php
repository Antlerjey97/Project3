<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    //
    public $timestamps = false;
    protected $table = "products";

    public function comment()
    {
        return $this->hasmany('App\comment', 'product_id', 'id');
    }

    public function category()
    {
        return $this->belongsto('App\category', 'id_category', 'id');

    }

    public function promotion()
    {
        return $this->belongsto('App\promotion', 'id_promotion', 'id');

    }

    public function oder_product()
    {
        return $this->belongsTo('App\oder_product', 'product_id', 'id');

    }

    public function bill()
    {
        return $this->belongsTo('App\bill', 'id_product', 'id');
    }

    public function order()
    {
        return $this->hasManyThrough('App\order', 'App\product', 'order_id', 'product_id', 'id');
    }
}
