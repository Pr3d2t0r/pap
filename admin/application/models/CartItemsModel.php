<?php
class CartItemsModel extends MY_Model{
    public function __construct(){
        parent::__construct();
        $this->table = 'cartitem';
    }

    public function getForCart($cartId, $mode="ARRAY", $class=null){
        if (is_null($cartId))
            return false;
        $this->db->where("cart_id", $cartId);
        $query = $this->db->get($this->table);
        if ($mode == "ARRAY")
            return $query->result_array();
        elseif ($mode == "OBJECT")
            return $query->result_object();
        elseif ($mode == "OBJECTTOCLASS")
            return $query->result($class);
        else
            throw new Exception("Choose a valid return type!");

    }
}