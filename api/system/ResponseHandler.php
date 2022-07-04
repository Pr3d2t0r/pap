<?php

class ResponseHandler{
    protected Db $db;
    protected ?array $parameters;
    protected Request $request;

    public function __construct(){
        $this->db = new Db();
    }

    public function setParameters(&$parameters){
        $this->parameters = $parameters;
    }

    public function setRequest(&$request){
        $this->request = $request;
    }

    protected function isLoggedIn(){
        $token = get_cookie('loginToken');
        if($token == null) return false;
        $userId = $this->db->getByField("userstokens", "token", $token);
        if($userId == null) return false;
        return $userId['user_id'];

    }
}