<?php
class QuestionModel extends MY_Model{
    public function __construct(){
        parent::__construct();
        $this->table = 'questions';
    }

    public function getAll($sort = 'id', $order = 'asc', $mode = "ARRAY", $class = null)
    {
        $this->db->order_by($sort, $order);
        $this->db->where("status", "active");
        $query = $this->db->get($this->table);
        if ($query->num_rows() > 0) {
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