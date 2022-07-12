<?php

class MY_Controller extends CI_Controller
{
    protected $user = null;
    protected bool $isLoggedIn = false;
    protected array $data = [
        'isLoggedIn' => false,
        'user' => null
    ];
    protected array $permissionNedded;

    public function __construct($permissionNedded=[],$loginNedded=true)
    {
        $this->permissionNedded = $permissionNedded;
        parent::__construct();
        $userId = $this->isUserLogedIn();
        if ($userId) {
            $this->user = $this->UserModel->getById($userId, "OBJECT");
            $this->user->employee_id = $this->UserModel->isEmployee($userId);
            if ($this->user->employee_id === false){
                $this->session->set_flashdata("error_msg", "Acesso Proibido!");
                redirect("login");
            }
            $this->user->permissions = $this->RoleModel->getForEmployee($this->user->employee_id);
            if (!$this->hasPermission()){
                $this->session->set_flashdata("error_msg", "Acesso Proibido!");
                redirect("login");
            }
            $this->user->personal_info = $this->PersonalInfoModel->getById($this->user->main_personal_info_id, "OBJECT");
            $this->isLoggedIn = true;
            $this->data['isLoggedIn'] = true;
            $this->data['user'] = $this->user;
            $this->data['page'] = $this->router->fetch_class();
        }else{
            if ($loginNedded){
                $this->session->set_flashdata("error_msg", "Acesso Proibido!");
                redirect("login");
            }
        }
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
    protected function hasPermission(){
        if (in_array("SuperAdmin", $this->user->permissions)) return true;
        foreach ($this->permissionNedded as $permission) if (!in_array($permission, $this->user->permissions)) return false;
        return true;
    }
}