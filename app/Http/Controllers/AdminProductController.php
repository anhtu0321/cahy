<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Components\Recusive;
use Storage;
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
    public function store(Request $request){
        $file = $request->file('feature_image_path');
        $fileNameOrigin = $file->getClientOriginalName();
        $fileNameHash = str_random(20).'.'.$file->getClientOriginalExtension();
        $path = $file->storeAs('public/product/'.auth()->id(),$fileNameHash);
        $data = [
            'file name' => $fileNameOrigin,
            'path' => Storage::url($path)
        ];
        dd($data);
    }
}
