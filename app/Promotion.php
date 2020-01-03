<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    //

    public $timestamps = false;
    protected $table = "promotion";

    public function product()
    {
        return $this->hasmany('App\Product', 'id_promotion', 'id');

    }
}
