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
        $this->openView("discounts/add");
    }
}
