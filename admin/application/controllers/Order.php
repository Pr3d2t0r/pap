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
        $this->data['orders'] = $this->OrderModel->getAll();
        foreach ($this->data['orders'] as $key => $order){
            $this->data['orders'][$key]['cliente'] = $this->PersonalInfoModel->getById($order['personal_info_id']);
            $this->data['orders'][$key]['store'] = $this->ShopModel->getById($order['shop_id']);
            switch ($order['status']) {
                case "received":
                    $this->data['orders'][$key]['statusMsg'] = "Processando";
                    break;
                case "awaiting_shipping":
                    $this->data['orders'][$key]['statusMsg'] = "Aguardando Envio";
                    break;
                case "shipped":
                    $this->data['orders'][$key]['statusMsg'] = "Enviado";
                    break;
                case "completed":
                    $this->data['orders'][$key]['statusMsg'] = "Entregue";
                    break;
                default:
                    $this->data['orders'][$key]['statusMsg'] = "Processando";
            }
        }
        $this->openView("order/index");
    }

    public function all(){
        $this->data['orders'] = $this->OrderModel->getAll();
        $this->openView("faq/index");
    }

    public function edit(){
        $body = $this->input->post();
        if (!isset($body['id'])){
            $this->session->set_flashdata("error_msg", "Acesso proibido!");
            redirect("faq");
        }
        $this->data['question'] = $this->QuestionModel->getById($body['id']);
        $this->openView("faq/edit");
    }

    public function add(){
        $this->openView("faq/add");
    }
}
