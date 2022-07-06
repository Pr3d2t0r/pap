<?php
class CartModel extends MY_Model{
    public function __construct(){
        parent::__construct();
        $this->table = 'cart';
    }

    public function getForUser($userId, $mode="ARRAY", $class=null){
        if (is_null($userId))
            return false;

        $this->db->where("user_id", $userId);
        $this->db->where("status", "checkout");

        $query = $this->db->get($this->table);
        if ($query->num_rows() > 0) {
            if ($mode == "ARRAY")
                return $query->row_array();
            elseif ($mode == "OBJECT")
                return $query->row_object();
            elseif ($mode == "OBJECTTOCLASS")
                return $query->row(0, $class);
            else
                throw new Exception("Choose a valid return type!");
        }
        return null;
    }
}