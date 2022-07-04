<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends MY_Controller {


    public function __construct()
    {
        parent::__construct();
        $this->load->library(array('form_validation'));
        $this->load->helper(array('passwordhash_helper'));
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
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');

        if (!$this->form_validation->run()) {
            $values = $this->input->post();
            $this->session->set_flashdata('registerErrors', [
                "first_name"=>[
                    "error" => form_error("first_name"),
                    "value" => $values['first_name'] ?? ""
                ],
                "last_name"=>[
                    "error" => form_error("last_name"),
                    "value" => $values['last_name'] ?? ""
                ],
                "email"=>[
                    "error" => form_error("email"),
                    "value" => $values['email'] ?? ""
                ],
                "phone_number"=>[
                    "error" => form_error("phone_number"),
                    "value" => $values['phone_number'] ?? ""
                ],
                "address"=>[
                    "error" => form_error("address"),
                    "value" => $values['address'] ?? ""
                ],
                "city"=>[
                    "error" => form_error("city"),
                    "value" => $values['city'] ?? ""
                ],
                "country"=>[
                    "error" => form_error("country"),
                    "value" => $values['country'] ?? ""
                ],
                "password"=>[
                    "error" => form_error("password"),
                    "value" => $values['password'] ?? ""
                ],
            ]);
            $this->session->set_flashdata("openModal", "register");
            redirect();
        } else {
            $this->session->set_flashdata('registerErrors');
            $result_arr = $this->input->post();
            if ($this->UserModel->emailExists($result_arr['email'])){
                $this->session->set_flashdata('registerErrors', [
                    "first_name"=>[
                        "error" => null,
                        "value" => $result_arr['first_name'] ?? ""
                    ],
                    "last_name"=>[
                        "error" => null,
                        "value" => $result_arr['last_name'] ?? ""
                    ],
                    "email"=>[
                        "error" => "<p>This email is already being used</p>",
                        "value" => $result_arr['email'] ?? ""
                    ],
                    "phone_number"=>[
                        "error" => null,
                        "value" => $result_arr['phone_number'] ?? ""
                    ],
                    "address"=>[
                        "error" => null,
                        "value" => $result_arr['address'] ?? ""
                    ],
                    "city"=>[
                        "error" => null,
                        "value" => $result_arr['city'] ?? ""
                    ],
                    "country"=>[
                        "error" => form_error("country"),
                        "value" => $result_arr['country'] ?? ""
                    ],
                    "password"=>[
                        "error" => null,
                        "value" => $result_arr['password'] ?? ""
                    ],
                ]);
                $this->session->set_flashdata("openModal", "register");
                redirect();
            }
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

            $passwordHash = new PasswordHash(4);

            $result_arr['password'] = $passwordHash->encrypt($result_arr['password']);

            $result_arr['main_personal_info_id'] = $this->PersonalInfoModel->insert($personal_info);
            $this->PersonalInfoModel->setUserId($result_arr['main_personal_info_id'], $this->UserModel->insert($result_arr));
            echo "Done!";
            $this->session->set_flashdata("success_msg", "Cliente Registrado com sucesso!");
            redirect();
        }
	}

    public function login(){
        if ($this->isLoggedIn) {
            redirect();
            return;
        }

        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if (!$this->form_validation->run()) {
            $values = $this->input->post();
            $this->session->set_flashdata('loginErrors', [
                "email"=>[
                    "error" => form_error("email"),
                    "value" => $values['email'] ?? ""
                ],
                "password"=>[
                    "error" => form_error("password"),
                    "value" => $values['password'] ?? ""
                ],
            ]);
            $this->session->set_flashdata("openModal", "login");
        } else {
            $this->session->set_flashdata('loginErrors');
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
                    echo "Done!";

                    $this->session->set_flashdata("success_msg", "Login efetuado com sucesso!");
                    redirect();
                } else {
                    $this->session->set_flashdata('loginErrors', [
                        "email"=>[
                            "error" => "<p>Credenciais invalidas!</p>",
                            "value" => $result_arr['email'] ?? ""
                        ],
                        "password"=>[
                            "error" => "<p>Credenciais invalidas!</p>",
                            "value" => ""
                        ],
                    ]);
                    $this->session->set_flashdata("openModal", "login");
                    redirect();
                }
            }else{
                $this->session->set_flashdata('loginErrors', [
                    "email"=>[
                        "error" => "<p>Email não está registrado!</p>",
                        "value" => $result_arr['email'] ?? ""
                    ],
                    "password"=>[
                        "error" => null,
                        "value" => ""
                    ],
                ]);
                $this->session->set_flashdata("openModal", "login");
                redirect();
            }
        }
    }

    public function logout(){
        if ($this->isLoggedIn) {
            $this->UserTokensModel->delete(get_cookie("loginToken"));
            set_cookie("loginToken", '0', time() - 3600);
            set_cookie("loginToken_", '0', time() - 3600);
        }
        $this->session->set_flashdata("success_msg", "Logout efetuado com sucesso!");
        redirect();
    }
}
