<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class promotion extends Model
{
    //
   
    public $timestamps = false;
     protected $table ="promotion";
    public function product(){
        return $this->hasmany('App\product','id_promotion','id');

   }
}
