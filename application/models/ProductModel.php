<?php
class ProductModel extends MY_Model{
    private string $categories = "productcategory";
    private string $discount = "productdiscount";
    private string $images = "productimages";
    private string $meta = "productmeta";
    private string $quantity = "productquantity";
    private string $reviews = "productreview";
    private string $tags = "producttag";

    public function __construct(){
        parent::__construct();
        $this->table = 'product';
    }

    public function getStockForProduct($productId, $shopId=false){
        if (is_null($productId))
            return false;
        $this->db->where("product_id", $productId);
        if ($shopId != false)
            $this->db->where("shop_id", $shopId);
        $result = $this->db->get($this->quantity);
        return $result->num_rows() > 0 ? $result->result_array() : null;
    }

    public function reserve($productId, $shopId, $qt){
        if (is_null($qt) || is_null($productId))
            return false;
        $product = $this->getStockForProduct($productId, $shopId);
        if (empty($product))
            return;
        $this->db->where("product_id", $productId);
        $this->db->where("shop_id", $shopId);
        $this->db->update($this->quantity, [
            "available_quantity" => $product[0]["available_quantity"] - $qt
        ]);
    }

    public function getAllLimit($limit){
        $query = $this->db->get($this->table, $limit);
        if ($query->num_rows() > 0)
            return $query->result_array();
        return null;
    }
}