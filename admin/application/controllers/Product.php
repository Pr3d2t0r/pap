<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends MY_Controller {


    public function __construct()
    {
        parent::__construct([], false);
        $this->load->library(array('form_validation'));
        $this->load->model(array('ProductModel'));
    }

    public function index(){
        $this->data['products'] = $this->ProductModel->getAll();
        $this->openView("product/index");
    }
}
