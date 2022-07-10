<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model(array("CampaignsModel", "ProductModel", "DiscountModel"));
    }

    public function index()
	{
        $this->data['campaigns'] = $this->CampaignsModel->getAll();
        $products = $this->ProductModel->getAllLimit(9);
        foreach ($products as $key => $product){
            if(isset($product['discount_id']) && !empty($product['discount_id'])){
                $discount = $this->DiscountModel->getById($product['discount_id']);
                $products[$key]['discount_amount'] = $product['price'] * ($discount['discount'] / 100);
                $products[$key]['new_price'] = $product['price'] - $products[$key]['discount_amount'];
            }
        }
        $this->data['products'] = $products;
		$this->openView("home/index");
	}
}
