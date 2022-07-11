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

    public function getAllLimit($limit, $filters=[]){
        if (!empty($filters)){
            $query = "Select * from " . $this->table . " where ";
            $where = [];
            if (isset($filters['discount'])){
                $where[] = "discount_id IN (select id from discount where discount >= ".$filters['discount'].")";
            }

            if (isset($filters['ratings'])){
                $where[] = "id IN (select product_id from productreview where rating >= ".$filters['ratings'].")";
            }

            if (isset($filters['range'])){
                $where[] = "price >= ".$filters['range'][0]." and price <= ".$filters['range'][1];
//                $where[] = "price >= ".$filters['range'][0]." and price - price * ((select discount from discount where id=product.discount_id limit 1)/100) <= ".$filters['range'][1];
            }

            if (isset($filters['q'])){
                $queryQ = "id IN (select product_id from productmeta where upper(content) like upper('%".$filters['q']."%')) ";
                $queryQ .= "or upper(title) like upper('%" . $filters['q'] . "%') ";
                $queryQ .= "or upper(description) like upper('%" . $filters['q'] . "%')";

                $where[] = $queryQ;
            }

            if (isset($filters['category'])){
                $where[] = "id IN (select pc.product_id from productcategory as pc inner join category as ct on ct.id=pc.category_id  where upper(ct.slug) like upper('".$filters['category']."'))";
            }
            $query .= implode(" AND ", $where);
//            echo $query;
            $result = $this->db->query($query );
            return $result->result_array();
        }

        $query = $this->db->get($this->table, $limit);
        if ($query->num_rows() > 0)
            return $query->result_array();
        return null;
    }
}