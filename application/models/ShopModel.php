<?php
class ShopModel extends MY_Model{
    public function __construct(){
        parent::__construct();
        $this->table = 'shop';
    }
    public function getLocationList(){
        $shops = $this->getAll();
        $locations = [];
        foreach ($shops as $shop){
            $added = false;
            for ($i=0; $i < count($locations); $i++){
                if (strtoupper($locations[$i]['county']) == strtoupper($shop['county'])){
                    if (!in_array(strtolower($shop['city']), array_map('strtolower', $locations[$i]['cities']))) {
                        $locations[$i]['cities'][] = $shop['city'];
                    }
                    $added = true;
                    break;
                }
            }
            if(!$added){
                $locations[] = [
                    "county" => $shop['county'],
                    "cities" => [$shop['city']]
                ];
            }
        }
        return $locations;
    }
}