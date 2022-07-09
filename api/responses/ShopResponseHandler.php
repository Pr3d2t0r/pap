<?php

class ShopResponseHandler extends ResponseHandler {
    public function __construct()
    {
        parent::__construct();
    }

    public function find(){
        if (!isset($this->parameters[0]))
            throw new Exception("Missing parameters.");
        $result = $this->db->executeGet("select * from `shop` where lower(city)=lower(?)", [$this->parameters[0]]);

        return $result;
    }
}