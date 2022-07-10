<?php
class CampaignsModel extends MY_Model{
    public function __construct(){
        parent::__construct();
        $this->table = 'campaign';
    }

}