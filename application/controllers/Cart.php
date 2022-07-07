<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends MY_Controller {


    public function __construct()
    {
        parent::__construct();
        $this->load->model(array("CartItemsModel", "CartModel", "PersonalInfoModel"));
        $this->load->library(array('form_validation'));
        $this->data['checkout'] = true;
        $this->data['formErrors'] = null;
    }

    public function checkout()
	{

        $this->data['cart'] = $this->isLoggedIn ? $this->CartModel->getForUser($this->user->id) : null;
        if ($this->data['cart'] != null)
            $this->data['cartItems'] = $this->CartItemsModel->getForCart($this->data['cart']['id']);

        $this->data['personalInfo'] = $this->isLoggedIn ? $this->PersonalInfoModel->getFromUser($this->user->id) : null;

        if ($this->isLoggedIn){
            $result = $this->input->post();
            var_dump($result);
            $newInfo = isset($result['new_info']);
            if ($newInfo) {
                $this->form_validation->set_rules('first_name', 'Primeiro Nome!', 'required|min_length[3]|max_length[160]');
                $this->form_validation->set_rules('last_name', 'Ultimo Nome', 'required|min_length[3]|max_length[160]');
                $this->form_validation->set_rules('phone_number', 'Nº de telemovel', 'required|min_length[9]|max_length[9]  ');
                $this->form_validation->set_rules('address', 'Morada', 'required|min_length[5]');
                $this->form_validation->set_rules('country', 'País', 'required|min_length[5]');
                $this->form_validation->set_rules('city', 'Cidade', 'required|min_length[5]');
            }else{
                $this->form_validation->set_rules('personal_info_id', 'Informação', 'required');
            }

            if (!$this->form_validation->run()){
                if ($newInfo) {
                    $this->data['formErrors'] = [
                        "first_name" => [
                            "error" => form_error("first_name"),
                            "value" => $result["first_name"] ?? ""
                        ],
                        "last_name" => [
                            "error" => form_error("last_name"),
                            "value" => $result["last_name"] ?? ""
                        ],
                        "phone_number" => [
                            "error" => form_error("phone_number"),
                            "value" => $result["phone_number"] ?? ""
                        ],
                        "address" => [
                            "error" => form_error("address"),
                            "value" => $result["address"] ?? ""
                        ],
                        "country" => [
                            "error" => form_error("country"),
                            "value" => $result["country"] ?? ""
                        ],
                        "city" => [
                            "error" => form_error("city"),
                            "value" => $result["city"] ?? ""
                        ]
                    ];
                    $this->session->set_flashdata("openModal", "PersonalInfo");
                }else{
                    $this->data['formErrors'] = [
                        "personal_info_id" => [
                            "error" => form_error("personal_info_id")
                        ]
                    ];
                }
            }else{
                $this->data['formErrors'] = null;
                if ($newInfo) {
                    unset($result['new_info']);
                    $this->session->set_flashdata("success_msg", "Novas informações adicionadas com sucesso!");
                    $result['user_id'] = $this->user->id;
                    $pi_id = $this->PersonalInfoModel->insert($result);
                }else
                    $pi_id = $result['personal_info_id'];
                $this->CartModel->associateUserInfo($this->data['cart']['id'], $pi_id);
                redirect("pagamento");
            }
        }
        $this->openView("cart/checkout");
	}

    public function payment()
	{
        if (!$this->isLoggedIn) {
            redirect("checkout");
            return;
        }

        $this->openView("cart/payment");
	}

    public function gotto(){
        redirect("checkout");
    }
}
