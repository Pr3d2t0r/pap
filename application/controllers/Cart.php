<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends MY_Controller {


    public function __construct()
    {
        parent::__construct();
    }

    public function checkout()
	{
		$this->load->view('general/header');
		$this->load->view('general/menu');
		$this->load->view('cart/checkout');
		$this->load->view('general/footer');
	}

    public function payment()
	{
		$this->load->view('general/header');
		$this->load->view('general/menu');
		$this->load->view('cart/payment');
		$this->load->view('general/footer');
	}
}
