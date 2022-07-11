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
        $post = $this->input->post();
        $filters = [];
        if (isset($post['discount']) && !empty($post['discount']))
            $filters['discount'] = $post['discount'];
        if (isset($post['ratings']) && !empty($post['ratings']))
            $filters['ratings'] = $post['ratings'];
        if (isset($post['range']) && !empty($post['range']))
            $filters['range'] = explode(" - ", str_replace("€", "", $post['range']));
        if (isset($post['q']) && !empty($post['q']))
            $filters['q'] = $post['q'];
//        var_dump($filters);
        $this->data['filters'] = $filters;
        $this->data['campaigns'] = $this->CampaignsModel->getAllLimit(5) ?? [];
        $products = $this->ProductModel->getAllLimit(9, $filters) ?? [];
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
