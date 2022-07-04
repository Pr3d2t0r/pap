<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends MY_Controller {


    public function __construct()
    {
        parent::__construct();
    }

    public function checkout()
	{
        $this->openView("cart/checkout");
	}

    public function payment()
	{
        $this->openView("cart/payment");
	}
}
