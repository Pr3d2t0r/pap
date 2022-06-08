<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends MY_Controller {


    public function __construct()
    {
        parent::__construct();
    }

    public function index(){
        $this->load->view('general/header');
        $this->load->view('general/menu');
        $this->load->view('product/index');
        $this->load->view('general/footer');
    }

    public function details($id)
	{
		$this->load->view('general/header');
		$this->load->view('general/menu');
		$this->load->view('product/detail');
		$this->load->view('general/footer');
	}
}
