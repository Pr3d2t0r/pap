<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends MY_Controller {


    public function __construct()
    {
        parent::__construct();
    }

    public function index(){
        $this->openView("product/index");
    }

    public function details($id){
        $this->openView("product/detail");
	}

    public function category($category){
        echo $category;
        $this->openView("product/detail");
	}
}
