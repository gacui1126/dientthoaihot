<?php

namespace App\Components;

class Recusive{

    private $data;
    private $htmlSelect = '';
    public function __construct($data){
        $this->data = $data;
    }

    public function categoryRecusive($id = 0){

        foreach($this->data as $value){
            $this->htmlSelect .= "<option value='".$value['id']."'>" . $value['name'] . "</option>";
        }
        return $this->htmlSelect;
    }
    public function productRecusive($id = 0){

        foreach($this->data as $value){
            $this->htmlSelect .= "<option value='".$value['id']."'>" . $value['name'] . "</option>";
        }
        return $this->htmlSelect;
    }
}
