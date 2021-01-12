<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Components\Recusive;
class CategoryController extends Controller
{
    public function create(){
        $data1 = Category::all();
        $recusive = new Recusive();
        $data['option'] = $recusive->categoryRecusive($data1, $id=0, '');
        return view('category.add', $data);
    }
    
    public function index(){
        return view('category.index');
    }
}
