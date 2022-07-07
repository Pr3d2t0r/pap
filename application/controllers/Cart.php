<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends MY_Controller {


    public function __construct()
    {
        parent::__construct();
        $this->load->model(array("CartItemsModel", "CartModel", "PersonalInfoModel"));
    }

    public function checkout()
	{

        $this->data['cart'] = $this->isLoggedIn ? $this->CartModel->getForUser($this->user->id) : null;
        if ($this->data['cart'] != null)
            $this->data['cartItems'] = $this->CartItemsModel->getForCart($this->data['cart']['id']);

        $this->data['personalInfo'] = $this->isLoggedIn ? $this->PersonalInfoModel->getFromUser($this->user->id) : null;

        $this->openView("cart/checkout");
	}

    public function payment()
	{
        if (!$this->isLoggedIn) {
            redirect("checkout");
            return;
        }
        $this->openView("cart/payment");
	}
}
