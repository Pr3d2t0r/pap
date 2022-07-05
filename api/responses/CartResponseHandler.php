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
        $cartItem = $this->db->getByField("cartitem", "product_id", $body['product_id'], "AND active=1 AND cart_id=".$body['cart_id']);
        if ($cartItem !== false && $cartItem !== null){
            $qt = intval($cartItem["quantity"]) + intval($body["quantity"]);
            if (!$this->validQuantity($cartItem['product_id'], $qt))
                throw new Exception("Quantity not available!");
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

    private function validQuantity($productId, $qt){
        $dbQt = $this->db->executeGet("select t1.* from `productquantity` as t1 inner join (select product_id, max(available_quantity) as available_quantity from `productquantity` group by product_id) as t2 on t1.product_id = t2.product_id and t1.available_quantity = t2.available_quantity where t1.product_id=?", [$productId]);
        var_dump($dbQt);
        return $qt >= $dbQt['quantity'];
    }

    /*public function update() {
        if (!isset($this->parameters[0]))
            throw new Exception("Missing parameters.");

        $result = $this->db->getById("user", $this->parameters[0]);

        if ($result === false)
            throw new Exception("User doesn't exist!");

        $result = $this->db->update("user", [
            "username" => "abc",
            "id" => $this->parameters[0],
        ]);

        if ($result === false)
            throw new Exception("Couldn't update this user.");

        return [
            "success" => "User updated successfully!"
        ];
    }*/

    /*public function delete() {
        if (isset($this->parameters[0]))
            $result = $this->db->getById("user", $this->parameters[0]);
        else
            throw new Exception("Missing parameters.");

        if ($result === false)
            throw new Exception("User doesn't exist!");

        $result = $this->db->delete("user", [
            "id" => $this->parameters[0]
        ]);

        if ($result === false)
            throw new Exception("Couldn't delete this user.");

        return [
            "success" => "User deleted successfully!"
        ];
    }*/
}