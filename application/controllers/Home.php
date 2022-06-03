<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {


    public function __construct()
    {
        parent::__construct();
    }

    public function index()
	{
		$this->load->view('general/header');
		$this->load->view('general/menu');
		$this->load->view('home/index');
		$this->load->view('general/footer');
	}
}
