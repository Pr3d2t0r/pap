<?php
class PaymentInfoModel extends MY_Model{
    public function __construct(){
        parent::__construct();
        $this->table = 'paymentinfo';
    }

    public function getFromUser($userId){
        if (is_null($userId))
            return false;
        $this->db->where("user_id", $userId);
        $query = $this->db->get($this->table);
        $num_rows = $query->num_rows();
        if ($num_rows > 0) {
            $result = $query->result_array();
            foreach ($result as $i => $item){
                $result[$i]['last_4_digits'] = substr(trim($result[$i]['number']), -4);
            }
        }
        return $result ?? null;
    }
}