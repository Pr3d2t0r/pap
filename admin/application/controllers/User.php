<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends MY_Controller {


    public function __construct()
    {
        parent::__construct([], false);
        $this->load->library(array('form_validation'));
        $this->load->helper(array('passwordhash_helper'));
    }

    public function login(){
        if ($this->isLoggedIn) {
            redirect();
            return;
        }
        $this->data['formError'] = $this->session->flashdata("error_msg");

        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run()) {
            $result_arr = $this->input->post();
            $user = $this->UserModel->getByEmail($result_arr['email']);
            if ($user != null) {
                $passwordHash = new PasswordHash(4);
                $success = $passwordHash->validPassword($result_arr['password'], $user['password']);
                if ($success) {
                    $strong = true;
                    $token = bin2hex(openssl_random_pseudo_bytes(64, $strong));
                    $this->UserTokensModel->insert([
                        "user_id" => $user['id'],
                        "token" => $token
                    ]);// token valido por 7 dias
                    //                                          Hora atual + 60 segundos * 60 minutos * 24 horas * 7 dias
                    set_cookie("loginToken", $token, time() + 60 * 60 * 24 * 7, null, '/', null, true);
                    set_cookie("loginToken_", '0', time() + 60 * 60 * 24 * 3, null, '/', null, true);
                    $this->session->set_flashdata("success_msg", "Login efetuado com sucesso!");
                    redirect();
                } else {
                    $this->data["formError"] = "Credenciais incorretas!";
                }
            }else{
                $this->data["formError"] = "Funcionario invalido!";
            }
        }
        $this->data['success'] = $this->session->flashdata("success_msg");
        $this->openView("user/login", false);
    }

    public function logout(){
        if ($this->isLoggedIn) {
            $this->UserTokensModel->delete(get_cookie("loginToken"));
            set_cookie("loginToken", '0', time() - 3600);
            set_cookie("loginToken_", '0', time() - 3600);
        }
        $this->session->set_flashdata("success_msg", "Logout efetuado com sucesso!");
        redirect("login");
    }
}
