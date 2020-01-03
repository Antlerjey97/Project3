<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    //
    protected $table = "comment";

    public function user()
    {
        return $this->belongsto('App\User', 'user_id', 'id');
    }

    public function product()
    {
        return $this->belongsto('App\product', 'product_id', 'id');
    }
}
