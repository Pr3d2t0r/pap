<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Help extends MY_Controller {


    public function __construct()
    {
        parent::__construct();
    }

    public function index()
	{
		$this->load->view('general/header');
		$this->load->view('general/menu');
		$this->load->view('help/index');
        $this->load->view('general/footer');
    }

    public function terms(){
        $this->load->view('general/header');
        $this->load->view('general/menu');
        $this->load->view('help/terms');
        $this->load->view('general/footer');
    }

    public function privacy(){
        $this->load->view('general/header');
        $this->load->view('general/menu');
        $this->load->view('help/privacy');
        $this->load->view('general/footer');
    }
}
