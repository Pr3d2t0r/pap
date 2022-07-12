<?php
class RoleModel extends MY_Model{
    public function __construct(){
        parent::__construct();
        $this->table = 'role';
    }

    public function getForEmployee($employeeId){
        $this->db->where_in("id", "select role_id from employeerole where employee_id=$employeeId", false);
        $query = $this->db->get($this->table);
        $perms = ["Any"];
        if ($query->num_rows() > 0) {
            $perms = [];
            $result = $query->result_array();
            foreach ($result as $roleObj) {
                $perms += unserialize($roleObj["permissions"]);
            }
        }
        return $perms;
    }
}