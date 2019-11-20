<?php

require_once 'db.php';

class goods{
    function getList(){
        $query = "select * from goods";
        return "qq";
    }
    function __construct($link) {
        //parent::connect('localhost');
        return $this -> getList($link);
        return 'test';
      }
}

//тест подключения
//$test = new goods();