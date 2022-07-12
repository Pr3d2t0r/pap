<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Campaign extends MY_Controller {


    public function __construct()
    {
        parent::__construct([], true);
        $this->load->library(array('form_validation'));
        $this->load->model(array('DiscountModel', 'CampaignsModel'));
    }

    public function index(){
        $this->data['campaigns'] = $this->CampaignsModel->getAll();
        $this->openView("campaign/index");
    }

    public function edit(){
        $body = $this->input->post();
        if (!isset($body['id'])){
            $this->session->set_flashdata("error_msg", "Acesso proibido!");
            redirect("campanhas");
        }
        $this->data['campaign'] = $this->CampaignsModel->getById($body['id']);
        $discounts = $this->DiscountModel->getAll();
        foreach ($discounts as $key => $discount){
            $campaign = $this->CampaignsModel->getForDiscount($discount['id']);
            $discounts[$key]['campaign'] = false;
            if (!empty($campaign))
                $discounts[$key]['campaign'] = $campaign;

        }
        $this->data['discounts'] = chunkArrayHalf($discounts);
        $this->openView("campaign/edit");
    }

    public function add(){
        $discounts = $this->DiscountModel->getAll();
        foreach ($discounts as $key => $discount){
            $campaign = $this->CampaignsModel->getForDiscount($discount['id']);
            $discounts[$key]['campaign'] = false;
            if (!empty($campaign))
                $discounts[$key]['campaign'] = $campaign;

        }
        $this->data['discounts'] = chunkArrayHalf($discounts);
        $this->openView("campaign/add");
    }
}
