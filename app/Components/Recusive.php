<?php

namespace App\Components;

class Recusive {
    private $htmlSelect;
    function categoryRecusive($data, $id, $text){
        foreach ($data as $value) {
            if($value->parent_id == $id){
                $this->htmlSelect .= '<option>'.$text.' '.$value->name.'</option>';
                $this->categoryRecusive($data, $value['id'], $text.'--');
            }
        }
        return $this -> htmlSelect;
    }
}