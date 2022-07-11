<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends MY_Controller {


    public function __construct()
    {
        parent::__construct();
        $this->load->model(array("ProductModel", "DiscountModel"));
    }

    public function index(){
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
        $products = $this->ProductModel->getAllLimit(9, $filters) ?? [];
        foreach ($products as $key => $product){
            if(isset($product['discount_id']) && !empty($product['discount_id'])){
                $discount = $this->DiscountModel->getById($product['discount_id']);
                $products[$key]['discount_amount'] = $product['price'] * ($discount['discount'] / 100);
                $products[$key]['new_price'] = $product['price'] - $products[$key]['discount_amount'];
            }
        }
        $this->data['products'] = $products;
        $this->openView("product/index");
    }

    public function details($id){
        $this->data['product'] = $this->ProductModel->getById($id);
        $this->data['title'] = $this->data['product']['meta_title'] . " | On Market Portugal";
        if(isset($this->data['product']['discount_id']) && !empty($this->data['product']['discount_id'])){
            $this->data['discount'] = $this->DiscountModel->getById($this->data['product']['discount_id']);
            $this->data['product']['discount_amount'] = $this->data['product']['price'] * ($this->data['discount']['discount'] / 100);
            $this->data['product']['new_price'] = $this->data['product']['price'] - $this->data['product']['discount_amount'];
        }
        /*if ($this->isLoggedIn)
            $this->data['review'] = $this->ProductModel->getReviewForUser($id, $this->user->id);*/
        $this->openView("product/detail");
	}

    public function category($category){
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
        $filters['category'] = $category;

        $this->data['filters'] = $filters;
        $products = $this->ProductModel->getAllLimit(9, $filters) ?? [];
        foreach ($products as $key => $product){
            if(isset($product['discount_id']) && !empty($product['discount_id'])){
                $discount = $this->DiscountModel->getById($product['discount_id']);
                $products[$key]['discount_amount'] = $product['price'] * ($discount['discount'] / 100);
                $products[$key]['new_price'] = $product['price'] - $products[$key]['discount_amount'];
            }
        }
        $this->data['products'] = $products;
        $this->openView("product/index");
	}
}
