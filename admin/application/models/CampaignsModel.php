<?php
class CampaignsModel extends MY_Model{
    public function __construct(){
        parent::__construct();
        $this->table = 'campaign';
    }

    public function getAllLimit($limit){
        $query = $this->db->get($this->table, $limit);
        if ($query->num_rows() > 0)
            return $query->result_array();
        return null;
    }

    public function getForDiscount($discountId){
        $this->db->where('discount_id', $discountId);
        $query = $this->db->get($this->table);
        if ($query->num_rows() > 0)
            return $query->row_array();
        return null;
    }

}