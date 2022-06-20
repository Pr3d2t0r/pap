<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends MY_Controller {


    public function __construct()
    {
        parent::__construct();
        $this->load->library(array('form_validation'));
        $this->load->helper(array('passwordhash'));
        $this->load->model(array('PersonalInfoModel'));
    }

    public function register(){
        $this->form_validation->set_rules('first_name', 'Primeiro Nome', 'required|min_length[3]|max_length[80]');
        $this->form_validation->set_rules('last_name', 'Ultimo Nome', 'required|min_length[3]|max_length[80]');
        $this->form_validation->set_rules('email', 'E-mail', 'trim|required|valid_email');
        $this->form_validation->set_rules('phone_number', 'Nº Telemovel', 'required|min_length[9]|max_length[9]');
        $this->form_validation->set_rules('address', 'Morada', 'required|min_length[10]');
        $this->form_validation->set_rules('city', 'Cidade', 'required|max_length[120]');
        $this->form_validation->set_rules('country', 'País', 'required|max_length[70]');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if (!$this->form_validation->run()) {
            //validation_errors() -> método responsável por recuperar as mensagens
            $this->session->set_flashdata('registerErrors', validation_errors());
            redirect();
        } else {
            $this->session->set_flashdata('registerErrors');
            $this->session->set_flashdata("success_msg", "Cliente Registrado com sucesso!");
            $result_arr = $this->input->post();
            $personal_info = [
                "first_name" => $result_arr['first_name'],
                "last_name" => $result_arr['last_name'],
                "phone_number" => $result_arr['phone_number'],
                "mail" => $result_arr['email'],
                "address" => $result_arr['address'],
                "city" => $result_arr['city'],
                "country" => $result_arr['country']
            ];

            unset($result_arr['first_name']);
            unset($result_arr['last_name']);
            unset($result_arr['phone_number']);
            unset($result_arr['address']);
            unset($result_arr['city']);
            unset($result_arr['country']);

            $result_arr['main_personal_info_id'] = $this->PersonalInfoModel->insert($personal_info);
            $this->PersonalInfoModel->setUserId($result_arr['main_personal_info_id'], $this->UserModel->insert($result_arr));
            echo "Done!";
        }

        // usar isto para mostrar o modal $('#myModal').modal('show') no js

	}
}
