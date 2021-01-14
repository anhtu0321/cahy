<?php

namespace App\Components;

class Recusive {
    private $htmlSelect;
    function categoryRecusive($data, $id, $text, $parentId){
        foreach ($data as $key => $value) {
            if($value->parent_id == $id){
                if(isset($parentId) && $parentId == $value->id){
                    $this->htmlSelect .= '<option selected="selected" value="'.$value->id.'">'.$text.' '.$value->name.'</option>';
                }else{
                    $this->htmlSelect .= '<option value="'.$value->id.'">'.$text.' '.$value->name.'</option>';
                }
                unset($data[$key]);
                $this->categoryRecusive($data, $value['id'], $text.'--', $parentId);
                
            }
        }
        return $this -> htmlSelect;
    }
}