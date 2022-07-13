<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Faq extends MY_Controller {


    public function __construct()
    {
        parent::__construct([], true);
        $this->load->library(array('form_validation'));
        $this->load->model('QuestionModel');
    }

    public function index(){
        $this->data['questions'] = $this->QuestionModel->getAll();
        $this->openView("faq/index");
    }

    public function edit(){
        $body = $this->input->post();
        if (!isset($body['id'])){
            $this->session->set_flashdata("error_msg", "Acesso proibido!");
            redirect("faq");
        }
        $this->data['question'] = $this->QuestionModel->getById($body['id']);
        $this->openView("faq/edit");
    }

    public function add(){
        $this->openView("faq/add");
    }
}
