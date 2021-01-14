<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;
    protected $table='categories';
    protected $primaryKey='id';
    protected $fillable = ['name','parent_id','slug'];
}
