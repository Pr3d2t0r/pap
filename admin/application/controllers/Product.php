<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends MY_Controller {


    public function __construct()
    {
        parent::__construct([], true);
        $this->load->library(array('form_validation'));
        $this->load->model(array('ProductModel', 'DiscountModel', 'CampaignsModel'));
    }

    public function index(){
        $this->data['products'] = $this->ProductModel->getAll();
        $this->openView("product/index");
    }

    public function edit(){
        $body = $this->input->post();
        if (!isset($body['id'])){
            $this->session->set_flashdata("error_msg", "Acesso proibido!");
            redirect("produtos");
        }
        $this->data['product'] = $this->ProductModel->getById($body['id']);
        $discounts = $this->DiscountModel->getAll();
        foreach ($discounts as $key => $discount){
            $campaign = $this->CampaignsModel->getForDiscount($discount['id']);
            $discounts[$key]['campaign'] = false;
            if (!empty($campaign))
                $discounts[$key]['campaign'] = $campaign;

        }
        $this->data['discounts'] = chunkArrayHalf($discounts);
        $this->data['metadata'] = $this->ProductModel->getMetaDataForProduct($body['id']) ?? [];
        $this->openView("product/edit");
    }
}
