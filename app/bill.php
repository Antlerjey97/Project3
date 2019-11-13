<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class bill extends Model
{
    //
    protected $table = "bill";
    public function order(){
        return $this->belongsTo('App\order','id_order','id');
    }
    public function product(){
        return $this->hasMany('App\product','id_product','id');
    }
}
