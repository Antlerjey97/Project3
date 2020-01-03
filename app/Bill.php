<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    //
    protected $table = "bill";

    public function order()
    {
        return $this->belongsTo('App\Order', 'id_order', 'id');
    }

    public function product()
    {
        return $this->hasMany('App\Product', 'id_product', 'id');
    }
}
