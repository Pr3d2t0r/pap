<?php
class UserModel extends MY_Model{
    private string $newsletter = "newsletter";
    private string $funcionario = "funcionario";
    public function __construct(){
        parent::__construct();
        $this->table = 'user';
    }

    public function emailExists($email){
        return $this->get("email", $email) != null;
    }

    public function getByEmail($email){
        $this->db->where_in("id", "select user_id from employee", false);
        return $this->get("email", $email);
    }
}