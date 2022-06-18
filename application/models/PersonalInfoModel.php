<?php
class PersonalInfoModel extends MY_Model{
    public function __construct(){
        parent::__construct();
        $this->table = 'personalinfo';
    }

    public function setUserId($personalInfoId, $userId){
        return $this->update($personalInfoId, ['user_id' => $userId]);
    }
}