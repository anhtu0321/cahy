<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function imageDetail(){
        return $this->hasMany('App\productImage','product_id');
    }
    public function tags(){
        return $this->belongsToMany('App\Tag','product_tags','product_id','tag_id');
    }
}
