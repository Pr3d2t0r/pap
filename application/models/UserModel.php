<?php
class UserModel extends MY_Model{
    private string $newsletter = "newsletter";
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

    public function newsletterEmailBeingUsed($email){
        $this->db->where("email", $email);
        $result = $this->db->get($this->newsletter);
        return $result->num_rows() > 0;
    }

    public function signUpToNewsLetter($email){
        if (!$this->newsletterEmailBeingUsed($email)) {
            $this->db->insert($this->newsletter, ["email" => $email]);
            return true;
        }
        return false;
    }
}