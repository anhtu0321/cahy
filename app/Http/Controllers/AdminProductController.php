<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;
use App\ProductImage;
use App\Components\Recusive;
use App\Traits\StorageImageTrait;
use Storage;
class AdminProductController extends Controller
{
    use StorageImageTrait;
    private $product;
    private $productImage;
    private $datacate;
    public function __construct(product $product){
        $this->product = $product;
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
        $data = $this->storageTraitUpload($request,'feature_image_path','product');
        if(!empty($data)){
            $this->product->feature_image_name = $data['file_name'];
            $this->product->feature_image_path = $data['file_path'];
        }
        $this->product->name = $request->name;
        $this->product->price = $request->price;
        $this->product->content = $request->content;
        $this->product->user_id = auth()->id();
        $this->product->category_id = $request->category_id;
        $this->product->save();
        if($request->hasFile('image_path')){
            foreach($request->image_path as $fileItem){
                $dataDetail = $this->storageTraitUploadMutiple($fileItem,'product');
                $imageDetail = new ProductImage([
                    'image_path' => $dataDetail['file_path'],
                    'image_name' => $dataDetail['file_name']
                ]);
                $this->product->imageDetail()->save($imageDetail);
            }
        }   
    }
}
