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

    public function stock(){
        $body = $this->request->post;
        $result = [];
        if (!isset($boby['city']) && !isset($body['productId']))
            throw new Exception("Missing parameters.");
        $stores = $this->db->executeGet("select * from `shop` where lower(city)=lower(?)", [$body["city"]]);
        $count = 0;
        foreach ($stores as $item){
            $qt = $this->db->executeGet("select * from `productquantity` where shop_id=? and product_id=?", [$item["id"], $body["productId"]]);
//            var_dump($qt);
            $result[$count]["hasStock"] = !empty($qt);
            $result[$count++]["address"] = $item['address'];
        }
        return $result;
    }
}