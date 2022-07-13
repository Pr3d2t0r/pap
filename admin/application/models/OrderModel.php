<?php
class OrderModel extends MY_Model{
    public function __construct(){
        parent::__construct();
        $this->table = 'order';
    }

    public function associateUserInfo($cartId, $personalInfoId) {
        if (is_null($cartId) || is_null($personalInfoId))
            return false;
        $this->db->where('id', $cartId);
        return $this->db->update($this->table, [
            "personal_info_id" => $personalInfoId
        ]);
    }

    public function getAllPending(){
        $this->db->where("status", "received");
        $query = $this->db->get($this->table);
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return null;
    }

    public function getAllProcessed(){
        $this->db->where("status !=", "received");
        $query = $this->db->get($this->table);
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return null;
    }

    public function associatePaymentInfo($cartId, $paymentInfoId) {
        if (is_null($cartId) || is_null($paymentInfoId))
            return false;
        $this->db->where('id', $cartId);
        return $this->db->update($this->table, [
            "payment_info_id" => $paymentInfoId,
            "status" => "ordered"
        ]);
    }

    public function getReference($orderId){
        $order = $this->getById($orderId, "OBJECT");
        return $order->reference ?? "###############";
    }

    public function process($orderId, $status){
        $this->db->where("id", $orderId);
        $this->db->update($this->table, [
            "status" => $status
        ]);
    }
}