<?php
class CategoryModel extends MY_Model{
    public function __construct(){
        parent::__construct();
        $this->table = 'category';
    }
}