<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model(array("CampaignsModel"));
    }

    public function index()
	{
        $this->data['campaigns'] = $this->CampaignsModel->getAll();
		$this->openView("home/index");
	}
}
