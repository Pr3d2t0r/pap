<?php

class MY_Controller extends CI_Controller
{
    protected $user = null;
    protected bool $isLoggedIn = false;
    protected $location = null;
    protected array $data = [
        'isLoggedIn' => false,
        'user' => null
    ];

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('location_helper');
        $userId = $this->isUserLogedIn();
        if ($userId) {
            $this->user = $this->UserModel->getById($userId, "OBJECT");
            $this->isLoggedIn = true;
            $this->data['isLoggedIn'] = true;
            $this->data['user'] = $this->user;
        }
        $this->data['locations'] = $this->ShopModel->getLocationList();
        $this->data['categories'] = chunkArrayHalf($this->CategoryModel->getAll());
        $this->data['location'] = $this->location = new Location();
    }

    private function isUserLogedIn(){
        $token = get_cookie('loginToken');
        if($token == null) return false;
        $userId = $this->UserTokensModel->getFromToken($token);
        if($userId == null) return false;
        $userId = $userId['user_id'];
        // verifica se ja está na altura de renovar o token
        if (get_cookie('loginToken_') != null)
            return $userId;
        // renova o token de login
        $strong = true;
        $token = bin2hex(openssl_random_pseudo_bytes(64, $strong));
        $this->UserTokensModel->insert([
            "user_id" => $userId,
            "token" => $token
        ]);
        // token valido por 7 dias
        //                                          Hora atual + 60 segundos * 60 minutos * 24 horas * 7 dias
        set_cookie("loginToken", $token, time() + 60 * 60 * 24 * 7, null, '/', null, true);
        set_cookie("loginToken_", '0', time() + 60 * 60 * 24 * 3, null, '/', null, true);
        return $userId;
    }

    protected function openView($name, $standardBody=true){
        if ($standardBody){
            $this->load->view('general/header', $this->data);
            $this->load->view('general/menu', $this->data);
            $this->load->view($name, $this->data);
            $this->load->view('general/footer', $this->data);
            return;
        }
        $this->load->view($name, $this->data);
    }
}