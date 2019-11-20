<?php

class goods extends db{
    function getList(){
        $query = "select * from goods";
        return "qq";
    }
    function __construct($link) {
        $linkFromParent = parent::extendConnect('localhost');
        return $this -> getList($linkFromParent);
        return 'test';
      }
}
