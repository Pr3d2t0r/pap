<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Shop extends MY_Controller {


    public function __construct()
    {
        parent::__construct([], true);
        $this->load->library(array('form_validation'));
        $this->load->model(array('ShopModel', 'ProductModel'));
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

        $this->form_validation->set_rules('phone_number', 'Nº de telemovel', 'trim|required|min_length[9]|max_length[9]');
        $this->form_validation->set_rules('address', 'Address', 'trim|required|max_length[400]');
        $this->form_validation->set_rules('county', 'Distrito', 'trim|required|max_length[255]');
        $this->form_validation->set_rules('city', 'Cidade', 'trim|required|max_length[120]');
        $this->form_validation->set_rules('country', 'País', 'trim|required|max_length[70]');
        if (!$this->form_validation->run()){
            $this->data['formError'] = validation_errors("<p class='text-danger small'>", "</p>");
        }else{
            $id = $body['id'];
            unset($body['id']);
            $this->ShopModel->update($id, $body);
            $this->session->set_flashdata("success_msg", "Loja editada com sucesso!");
            redirect("lojas");
        }
        $this->openView("shop/edit");
    }

    public function add(){
        $this->form_validation->set_rules('phone_number', 'Nº de telemovel', 'trim|required|min_length[9]|max_length[9]');
        $this->form_validation->set_rules('address', 'Address', 'trim|required|max_length[400]');
        $this->form_validation->set_rules('county', 'Distrito', 'trim|required|max_length[255]');
        $this->form_validation->set_rules('city', 'Cidade', 'trim|required|max_length[120]');
        $this->form_validation->set_rules('country', 'País', 'trim|required|max_length[70]');

        if (!$this->form_validation->run()){
            $this->data['formError'] = validation_errors("<p class='text-danger small'>", "</p>");
        }else{
            $body = $this->input->post();
            $this->ShopModel->insert($body);
            $this->session->set_flashdata("success_msg", "Loja criada com sucesso!");
            redirect("lojas");
        }

        $this->openView("shop/add");
    }

    public function remove(){
        $body = $this->input->post();
        if (!isset($body['id'])){
            $this->session->set_flashdata("error_msg", "Acesso proibido!");
            redirect("lojas");
        }
        $this->ShopModel->delete($body['id']);
        $this->session->set_flashdata("success_msg", "Loja removida com sucesso!");
        redirect("lojas");
    }

    public function addstock($id){
        $this->data['products'] = $this->ProductModel->getAll();
        if (empty($this->data['products'])){
            $this->session->set_flashdata("error_msg", "Adicione produtos primeiro antes de adicionar stock!");
            redirect("produtos/add");
        }
        $body = $this->input->post();
        if (isset($body['qt']) || isset($body['product_id'])){
            if (isset($body['qt'])){
                if (isset($body['product_id']) && !empty($body['product_id'])){
                    $qt = $body['qt'];
                    if ($qt > 0){
                        $this->ProductModel->addStock($id, $body['product_id'], $qt);
                        $this->session->set_flashdata("sucess_msg", "Stock adicionado com sucesso");
                        redirect("loja/" . $id . "/stock");
                    }else
                        $this->data['formError'] = "<p class='text-danger small'>Insira uma quantidade valida</p>";
                }else
                    $this->data['formError'] = "<p class='text-danger small'>Selecione um produto</p>";
            }else
                $this->data['formError'] = "<p class='text-danger small'>Insira a quantidade</p>";
        }
        $this->openView("shop/add_stock");
    }

    public function stock($id){
//        $shop = $this->ShopModel->getById($id);
        $stock = $this->ProductModel->getStockForShop($id);
        if (is_array($stock))
            foreach ($stock as $key => $item){
                $stock[$key]['product'] = $this->ProductModel->getById($item['product_id']);
            }
        $this->data['stock'] = $stock;
        $this->openView("shop/see_stock");
    }
}
