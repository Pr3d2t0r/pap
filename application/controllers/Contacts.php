<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contacts extends MY_Controller {


    public function __construct()
    {
        parent::__construct();
        $this->load->library(array('form_validation'));
        $this->load->model("ContactsModel");
    }

    public function index()
	{
        $this->data['title'] = "Contacte-nos";
        $this->form_validation->set_rules('name', 'Nome', 'required|min_length[3]|max_length[160]');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('subject', 'Assunto', 'required|min_length[5]|max_length[150]');
        $this->form_validation->set_rules('body', 'Mensagem', 'required|min_length[5]');

        if (!$this->form_validation->run()) {
            $this->data['formErrors'] = [
                "name" => [
                    "error" => form_error("name"),
                ],
                "email" => [
                    "error" => form_error("email"),
                ],
                "subject" => [
                    "error" => form_error("subject"),
                ],
                "body" => [
                    "error" => form_error("body"),
                ],
            ];
        } else {
            $this->data['formErrors'] = null;
            $result = $this->input->post();
            $this->ContactsModel->insert($result);
            $this->session->set_flashdata("success_msg", "Mensagem enviada com sucesso!");
            redirect("contactos");
        }

        $this->openView("contacts/index");
	}
}
