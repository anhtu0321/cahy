<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Components\Recusive;

class AdminProductController extends Controller
{
    private $category;
    private $datacate;
    public function __construct(){
        $this->category = new Category;
        $this->datacate = Category::all();
    }
    public function index(){
        return view('admin.product.index');
    }
    public function create(){
        $recusive = new Recusive();
        $data['option'] = $recusive->categoryRecusive($this->datacate, $id=0, '','');
        return view('admin.product.add',$data);
    }
}
