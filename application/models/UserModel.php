<?php
class UserModel extends MY_Model{
    public function __construct(){
        parent::__construct();
        $this->table = 'user';
    }

    public function emailExists($email){
        return $this->get("email", $email) != null;
    }

    public function getByEmail($email){
        return $this->get("email", $email);
    }
}