<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Components\Recusive;
class CategoryController extends Controller
{
    private $category;
    private $datacate;
    public function __construct(){
        $this->category = new Category;
        $this->datacate = Category::all();
    }
    public function create(){
        $recusive = new Recusive();
        $data['option'] = $recusive->categoryRecusive($this->datacate, $id=0, '','');
        return view('category.add', $data);
    }
    public function index(){
        // $category = new Category;
        $data["cates"] = $this->category->latest()->paginate(5);
        return view('category.index',$data);
    }
    public function store(Request $request){
        // $category = new Category;
        $this->category->name = $request->name;
        $this->category->parent_id = $request->parent_id;
        $this->category->slug = str_slug($request->name);
        $this->category->save();
        return redirect()->route('categories.index');
    }
    public function edit($id){
        $recusive = new Recusive();
        $data['category'] = $this->category->find($id);
        $data['option'] = $recusive->categoryRecusive($this->datacate, $id=0, '', $data['category']->parent_id);
        return view('category.edit',$data);
    }
    public function update(Request $request, $id){
        $cateupdate = $this->category->find($id);
        $cateupdate->name = $request->name;
        $cateupdate->parent_id = $request->parent_id;
        $cateupdate->slug = str_slug($request->name);
        $cateupdate->save();
        return redirect()->route('categories.index');
    }
}

