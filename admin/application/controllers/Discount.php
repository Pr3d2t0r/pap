<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Discount extends MY_Controller {


    public function __construct()
    {
        parent::__construct([], true);
        $this->load->library(array('form_validation'));
        $this->load->model(array('DiscountModel', 'CampaignsModel'));
    }

    public function index(){
        $discounts = $this->DiscountModel->getAll();
        if (is_array($discounts))
            foreach ($discounts as $key => $discount){
                $campaign = $this->CampaignsModel->getForDiscount($discount['id']);
                $discounts[$key]['campaign'] = false;
                if (!empty($campaign))
                    $discounts[$key]['campaign'] = $campaign;
            }
        $this->data['discounts'] = $discounts;
        $this->openView("discounts/index");
    }

    public function add(){
        $this->form_validation->set_rules('discount', 'Pergunta', 'trim|required|min_length[1]|max_length[3]');
        $this->form_validation->set_rules('starts_at', 'Validade (De)', 'trim|required');
        $this->form_validation->set_rules('ends_at', 'validade (Até)', 'trim|required');

        if (!$this->form_validation->run()){
            $this->data['formError'] = validation_errors("<p class='text-danger small'>", "</p>");
        }else{
            $body = $this->input->post();
            $this->DiscountModel->insert($body);
            $this->session->set_flashdata("success_msg", "Desconto adicionado com sucesso!");
            redirect("descontos");
        }

        $this->openView("discounts/add");
    }

    public function remove(){
        $body = $this->input->post();
        if (!isset($body['id'])){
            $this->session->set_flashdata("error_msg", "Acesso proibido!");
            redirect("descontos");
        }
        $this->DiscountModel->delete($body['id']);
        $this->session->set_flashdata("success_msg", "Desconto removido com sucesso!");
        redirect("descontos");
    }
}
