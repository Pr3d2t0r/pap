<?php

class OrderResponseHandler extends ResponseHandler {
    public function __construct()
    {
        parent::__construct();
    }

    public function find(){
        if (!isset($this->parameters[0]))
            throw new Exception("Missing parameters.");
        $result = $this->db->executeGet("select `o`.*, concat(`pi`.`first_name`, ' ', `pi`.`last_name`) as `name`  from `order` as `o` inner join `personalinfo` as `pi` on `o`.`personal_info_id`=`pi`.`id` where reference=?", [$this->parameters[0]]);
        if (empty($result))
            throw new Exception("There isn't any order with this reference!");
        return $result[0];
    }

    public function month(){
        $result = $this->db->executeGet("select * from `order`", [], PDO::FETCH_OBJ);
        $monthArr = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        if (!empty($result)){
            foreach ($result as $order){
                $date = DateTime::createFromFormat("Y-m-d H:i:s",$order->created_at);
                $month = date("m", $date->getTimestamp());
                $monthArr[intval($month)-1] += $order->total;
            }
        }
        return $monthArr;
    }
}