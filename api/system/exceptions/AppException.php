<?php


class AppException extends Exception{
    public array $data;
    public function __construct(string $msg, array $data=[])
    {
        parent::__construct($msg);
        $this->data = $data;
    }
}