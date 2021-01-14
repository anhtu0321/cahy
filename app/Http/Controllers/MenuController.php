<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Components\Recusive;
use App\Menu;
class MenuController extends Controller
{
    private $menu;
    private $dataMenu;
    public function __construct(){
        $this->menu = new Menu;
        $this->dataMenu = Menu::all();
    }
    public function index()
    {
        $data['menus'] = $this->menu->latest()->paginate(5);
        return view('menu.index',$data);
    }
    public function create(){
        $recusive = new Recusive();
        $data['option']=$recusive->categoryRecusive($this->dataMenu, $id=0, '','');
        return view('menu.add',$data);
    }
    public function store(Request $request){
        $this->menu->name = $request->name;
        $this->menu->slug = str_slug($request->name);
        $this->menu->parent_id = $request->parent_id;
        $this->menu->save();
        return redirect()->route('menus.index');
    }
    public function edit($id){
        $recusive = new Recusive();
        $data['menus'] = $this->menu->find($id);
        $data['option'] = $recusive->categoryRecusive($this->dataMenu, $id=0, '', $data['menus']->parent_id);
        return view('menu.edit',$data);
    }
    public function update(Request $request, $id){
        $menuupdate = $this->menu->find($id);
        $menuupdate->name = $request->name;
        $menuupdate->parent_id = $request->parent_id;
        $menuupdate->slug = str_slug($request->name);
        $menuupdate->save();
        return redirect()->route('menus.index');
    }
    public function delete($id){
        $this->menu->find($id)->delete();
        return redirect()->route('menus.index');
    }
}
