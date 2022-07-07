<?php

class CartResponseHandler extends ResponseHandler {
    public function __construct()
    {
        parent::__construct();
    }

    public function index(){
        if (isset($this->parameters[0]))
            $result = $this->db->getById("cart", $this->parameters[0]);
        else
            throw new Exception("Missing parameters.");

        if ($result === false || $result === null)
            throw new Exception("Cart doesn't exist!");

        return $result;
    }

    public function item(){
        if (isset($this->parameters[0]))
            $result = $this->db->getById("cartitem", $this->parameters[0]);
        else
            throw new Exception("Missing parameters.");

        if ($result === false || $result === null)
            throw new Exception("Cart item doesn't exist!");

        return $result;
    }

    public function user(){
        if (!isset($this->parameters[0]))
            throw new Exception("Missing parameters.");

        $result = $this->db->getByField("cart","user_id", $this->parameters[0], "AND status='checkout'");
        if ($result === false || $result === null)
            $this->db->insert("cart", [
                "user_id" => $this->parameters[0]
            ]);
        return $this->db->getByField("cart","user_id", $this->parameters[0], "AND status='checkout'");
    }

    public function add(){
        if (!isset($this->request->post['product_id']) || !isset($this->request->post['quantity']) || !isset($this->request->post['cart_id']))
            throw new Exception("Missing parameters.");

        $body = $this->request->post;
        /*$product = $this->db->getById('product', $body['product_id']);

        if ($product === false || $product === null)
            throw new Exception("Product Doesn't exists");*/

        if ($body['quantity']<0)
            throw new Exception("Quantity can not be negative!");

        $qt = intval($body["quantity"]);

        if (!$this->validQuantity($body['product_id'], $qt))
            throw new AppException("Quantity not available!", [
                "max_quantity"=>$this->maxQuantity($body['product_id'])
            ]);



        $cartItem = $this->db->getByField("cartitem", "product_id", $body['product_id'], "AND active=1 AND cart_id=".$body['cart_id']);


        if ($cartItem !== false && $cartItem !== null){

            $this->db->update("cartitem", [
                "quantity" => $qt,
                "id" => $cartItem['id']
            ]);

            return [
                "success" => "Updated quantity!",
                "cartItemId" => $cartItem['id']
            ];
        }

        $insertData =  [
            "product_id" => $body["product_id"],
            "cart_id" => $body["cart_id"],
            "quantity" => $body["quantity"],
            "price" => $product["price"] ?? 120,
        ];

        if (isset($body["discount_id"]) )
            $insertData["discount_id"] = $body["discount_id"];

        $successfulId = $this->db->insert('cartitem', $insertData);

        if ($successfulId === false)
            throw new Exception("Error while inserting!");

        return [
            "success" => "Product added on the cart!",
            "cartItemId" => $successfulId
        ];
    }

    public function remove(){
        if (!isset($this->request->post['product_id']) || !isset($this->request->post['cart_id']))
            throw new Exception("Missing parameters.");

        $body = $this->request->post;

        /*$product = $this->db->getById('product', $body['product_id']);

        if ($product === false || $product === null)
            throw new Exception("Product Doesn't exists");*/

        $cartItem = $this->db->getByField("cartitem", "product_id", $body['product_id'], "AND active=1 AND cart_id=".$body['cart_id']);


        if ($cartItem !== false && $cartItem !== null){
            $successful = $this->db->delete('cartitem', ["id"=>$cartItem['id']]);

            if ($successful === false)
                throw new Exception("Error while deleting!");
        }

        return [
            "success" => "Removed with success!",
            "items" => $this->db->executeGet("select ci.quantity, p.price, p.title, p.id, p.reference from `CartItem` as ci inner join `Product` as p on ci.product_id=p.id where ci.cart_id=? AND active=1", [$body["cart_id"]])
        ];
    }

    public function checkout(){
        if (!isset($this->request->post['items']) || !isset($this->request->post['cart_id']))
            throw new Exception("Missing parameters.");

        $body = $this->request->post;

        $this->db->delete("cartitem", [
           "cart_id"=>$body['cart_id']
        ]);

        for ($i=0; $i < count($body['items']); $i++){
            /*$product = $this->db->getById('product', $body['items']['id']);

            if ($product === false || $product === null)
                throw new Exception("Product Doesn't exists");*/
            $insertData =  [
                "product_id" => $body['items'][$i]['id'],
                "cart_id" => $body['cart_id'],
                "quantity" => $body['items'][$i]['quantity'],
                "price" => $product["price"] ?? 120,
            ];

            if (isset($body['items'][$i]["discount_id"]))
                $insertData["discount_id"] = $body['items'][$i]['discount_id'];

            $successfulId = $this->db->insert('cartitem', $insertData);

            if ($successfulId === false)
                throw new Exception("Error while inserting!");
        }

        return [
            "success" => "Ready for checkout!"
        ];
    }

    private function validQuantity($productId, $qt){
        $dbQt = $this->db->executeGet("select t1.* from `productquantity` as t1 inner join (select product_id, max(available_quantity) as available_quantity from `productquantity` group by product_id) as t2 on t1.product_id = t2.product_id and t1.available_quantity = t2.available_quantity where t1.product_id=?", [$productId]);
        if (count($dbQt)<1 || empty($dbQt))
            return false;
        return $qt <= $dbQt[0]['available_quantity'];
    }
    private function maxQuantity($productId){
        $dbQt = $this->db->executeGet("select t1.* from `productquantity` as t1 inner join (select product_id, max(available_quantity) as available_quantity from `productquantity` group by product_id) as t2 on t1.product_id = t2.product_id and t1.available_quantity = t2.available_quantity where t1.product_id=?", [$productId]);
        return $dbQt[0]['available_quantity'];
    }
}