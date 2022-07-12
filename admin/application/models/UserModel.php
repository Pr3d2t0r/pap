<?php
class UserModel extends MY_Model{
    private string $newsletter = "newsletter";
    private string $funcionario = "employee";
    public function __construct(){
        parent::__construct();
        $this->table = 'user';
    }

    public function isEmployee($userId){
        if (is_null($userId))
            return false;
        $this->db->where('user_id', $userId);
        $query = $this->db->get($this->funcionario);
        if ($query->num_rows() > 0) return $query->row_array()['id'];
        return false;
    }

    public function emailExists($email){
        return $this->get("email", $email) != null;
    }

    public function getByEmail($email){
        $this->db->where_in("id", "select user_id from ".$this->funcionario, false);
        return $this->get("email", $email);
    }
}