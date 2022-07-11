<?php
class PersonalInfoModel extends MY_Model{
    public function __construct(){
        parent::__construct();
        $this->table = 'personalinfo';
    }

    public function setUserId($personalInfoId, $userId){
        return $this->update($personalInfoId, ['user_id' => $userId]);
    }

    public function getFromUser($userId, $mode="ARRAY", $class=null){
        if (is_null($userId))
            return false;
        $this->db->where("user_id", $userId);
        $query = $this->db->get($this->table);
        $num_rows = $query->num_rows();
        if ($num_rows > 0) {
            if ($mode == "ARRAY")
                return $query->result_array();
            elseif ($mode == "OBJECT")
                return $query->result_object();
            elseif ($mode == "OBJECTTOCLASS")
                return $query->result($class);
            else
                throw new Exception("Choose a valid return type!");
        }
        return null;
    }
}