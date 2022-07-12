<?php
class InfoModel extends CI_Model{
    public function getUserAmount(){
        $result = $this->db->get("user");
        return $result->num_rows();
    }

    public function getPedingOrders(){
        $this->db->where("status", "received");
        $result = $this->db->get("order");
        return $result->num_rows();
    }

    public function getEarnings(){
        $this->db->select_sum("total", "total");
        $this->db->where("created_at >", "DATE_SUB(now(), INTERVAL 3 MONTH)");
        $result = $this->db->get("order");
        return number_format($result->row_array()['total']??0, 2);
    }

    public function getAmountOfSales(){
        $this->db->where("created_at >", "DATE_SUB(now(), INTERVAL 3 MONTH)");
        $result = $this->db->get("order");
        return $result->num_rows();
    }
}