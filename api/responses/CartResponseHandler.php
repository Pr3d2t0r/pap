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

    public function update() {
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
    }

    public function delete() {
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
    }
}