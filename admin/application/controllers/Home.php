<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends My_Controller {
	public function index()
	{
        $this->load->model("InfoModel", "imodel");
        $this->data['amountOfSales'] = $this->imodel->getAmountOfSales();
        $this->data['earnings'] = $this->imodel->getEarnings();
        $this->data['amountOfUsers'] = $this->imodel->getUserAmount();
        $this->data['pendingOrders'] = $this->imodel->getPedingOrders();
		$this->openView('home/index');
	}
}
