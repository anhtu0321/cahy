<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function imageDetail(){
        return $this->hasMany('App\productImage','product_id');
    }
}
