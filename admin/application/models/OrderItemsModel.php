<?php
class OrderItemsModel extends MY_Model{
    public function __construct(){
        parent::__construct();
        $this->table = 'orderitem';
    }

    public function getForOrder($orderId, $mode="ARRAY", $class=null){
        if (is_null($orderId))
            return false;
        $this->db->where("order_id", $orderId);
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