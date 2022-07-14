<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends MY_Controller {


    public function __construct()
    {
        parent::__construct([], true);
        $this->load->library(array('form_validation'));
        $this->load->model(array('OrderModel', 'PersonalInfoModel', 'ShopModel'));
    }

    public function index(){
        $this->data['orders'] = $this->OrderModel->getAllProcessed();
        if (is_array($this->data['orders']))
            foreach ($this->data['orders'] as $key => $order){
                $this->data['orders'][$key]['cliente'] = $this->PersonalInfoModel->getById($order['personal_info_id']);
                $this->data['orders'][$key]['store'] = $this->ShopModel->getById($order['shop_id']);
                $this->data['orders'][$key]['statusMsg'] = $this->statusMsg($order['status']);
                $this->data['orders'][$key]['sent'] = $order['status'] != "awaiting_shipping";
                $this->data['orders'][$key]['complete'] = $order['status'] = "complete";
            }
        $this->data['pendingOrders'] = $this->OrderModel->getAllPending();
        if(is_array($this->data['pendingOrders']))
            foreach ($this->data['pendingOrders'] as $key => $order){
                $this->data['pendingOrders'][$key]['cliente'] = $this->PersonalInfoModel->getById($order['personal_info_id']);
                $this->data['pendingOrders'][$key]['store'] = $this->ShopModel->getById($order['shop_id']);
                $this->data['pendingOrders'][$key]['statusMsg'] = $this->statusMsg($order['status']);
            }
        $this->openView("order/index");
    }

    public function process(){
        $body = $this->input->post();
        if (!isset($body['id'])){
            $this->session->set_flashdata("error_msg", "Acesso proibido!");
            redirect("pedidos");
        }
        $this->OrderModel->process($body['id'], "awaiting_shipping");
        $this->session->set_flashdata("success_msg", "Pedido Processado com sucesso!");
        redirect("pedidos");
    }

    public function send(){
        $body = $this->input->post();
        if (!isset($body['id'])){
            $this->session->set_flashdata("error_msg", "Acesso proibido!");
            redirect("pedidos");
        }
        $this->OrderModel->process($body['id'], "shipped");
        $this->session->set_flashdata("success_msg", "Pedido Processado com sucesso!");
        redirect("pedidos");
    }

    private function statusMsg($status){
        switch ($status) {
            case "awaiting_shipping":
                return "Aguardando Envio";
            case "shipped":
                return "Enviado";
            case "completed":
                return "Entregue";
            default:
                return "Processando";
        }
    }
}
