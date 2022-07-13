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
        $this->form_validation->set_rules('question', 'Pergunta', 'trim|required|min_length[10]|max_length[300]');
        $this->form_validation->set_rules('response', 'Resposta', 'trim|required|min_length[10]|max_length[800]');
        if (!$this->form_validation->run()){
            $this->data['formError'] = validation_errors("<p class='text-danger small'>", "</p>");
        }else{
            $data = [
                "question" => $body['question'],
                "response" => $body['response'],
                "status" => empty($body['status']) ? "inactive" : "active"
            ];
            $this->QuestionModel->update($body['id'], $data);
            $this->session->set_flashdata("success_msg", "Pergunta editada com sucesso!");
            redirect("faq");
        }
        $this->data['question'] = $this->QuestionModel->getById($body['id']);
        $this->openView("faq/edit");
    }
    public function remove(){
        $body = $this->input->post();
        if (!isset($body['id'])){
            $this->session->set_flashdata("error_msg", "Acesso proibido!");
            redirect("faq");
        }
        $this->QuestionModel->delete($body['id']);
        $this->session->set_flashdata("success_msg", "Pergunta removida com sucesso!");
        redirect("faq");
    }

    public function add(){
        $this->form_validation->set_rules('question', 'Pergunta', 'trim|required|min_length[10]|max_length[300]');
        $this->form_validation->set_rules('response', 'Resposta', 'trim|required|min_length[10]|max_length[800]');
        if (!$this->form_validation->run()){
            $this->data['formError'] = validation_errors("<p class='text-danger small'>", "</p>");
        }else{
            $body = $this->input->post();
            $this->QuestionModel->insert($body);
            $this->session->set_flashdata("success_msg", "Pergunta adicionada com sucesso!");
            redirect("faq");
        }
        $this->openView("faq/add");
    }
}
