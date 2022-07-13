<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Shop extends MY_Controller {


    public function __construct()
    {
        parent::__construct([], true);
        $this->load->library(array('form_validation'));
        $this->load->model(array('ShopModel', 'ProductModel', ''));
    }

    public function index(){
        $this->data['shops'] = $this->ShopModel->getAll();
        $this->openView("shop/index");
    }

    public function edit(){
        $body = $this->input->post();
        if (!isset($body['id'])){
            $this->session->set_flashdata("error_msg", "Acesso proibido!");
            redirect("lojas");
        }
        $this->data['shop'] = $this->ShopModel->getById($body['id']);
        $this->openView("shop/edit");
    }

    public function add(){
        $this->openView("shop/add");
    }

    public function addstock($id){
        $this->openView("shop/add");
    }

    public function stock($id){
//        $shop = $this->ShopModel->getById($id);
        $stock = $this->ProductModel->getStockForShop($id);
        foreach ($stock as $key => $item){
            $stock[$key]['product'] = $this->ProductModel->getById($item['product_id']);
        }
        $this->data['stock'] = $stock;
        $this->openView("shop/see_stock");
    }
}
