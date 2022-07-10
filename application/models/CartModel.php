<?php
class CartModel extends MY_Model{
    public string $cartPublicTokens = "cartpublictokens";
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

    public function getForToken($token, $mode="ARRAY", $class=null){
        if (is_null($token))
            return false;

        $token = $this->getPublicToken($token);
        if ($token == null)
            return null;
        $this->db->where("id", $token['cart_id']);
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

    public function associateUserInfo($cartId, $personalInfoId) {
        if (is_null($cartId) || is_null($personalInfoId))
            return false;
        $this->db->where('id', $cartId);
        return $this->db->update($this->table, [
            "personal_info_id" => $personalInfoId
        ]);
    }

    public function associatePaymentInfo($cartId, $paymentInfoId) {
        if (is_null($cartId) || is_null($paymentInfoId))
            return false;
        $this->db->where('id', $cartId);
        $this->db->update($this->table, [
            "payment_info_id" => $paymentInfoId,
            "status" => "ordered"
        ]);
        return $this->getById($cartId);
    }

    public function createPublicToken($cartId){
        $this->db->where("cart_id", $cartId);
        $q = $this->db->get($this->cartPublicTokens);
        if ($q->num_rows() > 0)
            return $q->row_array();
        $this->db->insert($this->cartPublicTokens, [
            "cart_id" => $cartId
        ]);
        $this->db->where("id", $this->db->insert_id());
        $q = $this->db->get($this->cartPublicTokens);
        return $q->row_array();
    }

    public function getPublicToken($token){
        $this->db->where("token", $token);
        $q = $this->db->get($this->cartPublicTokens);
        if ($q->num_rows() > 0)
            return $q->row_array();
        return null;
    }
}