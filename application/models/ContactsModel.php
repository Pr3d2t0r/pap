<?php
class ContactsModel extends MY_Model{
    public function __construct(){
        parent::__construct();
        $this->table = 'contacts';
    }
}