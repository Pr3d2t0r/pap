<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Help extends MY_Controller {


    public function __construct()
    {
        parent::__construct();
        $this->load->model(array("QuestionModel"));
    }

    public function index()
	{
        $this->data['questions'] = $this->QuestionModel->getAll();
        $this->openView("help/index");
    }

    public function terms(){
        $this->openView("help/terms");
    }

    public function privacy(){
        $this->openView("help/privacy");
    }
}
