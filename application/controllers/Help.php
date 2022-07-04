<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Help extends MY_Controller {


    public function __construct()
    {
        parent::__construct();
    }

    public function index()
	{
        $this->openView("help/index");
    }

    public function terms(){
        $this->openView("help/terms");
    }

    public function privacy(){
        $this->openView("help/privacy");
    }
}
