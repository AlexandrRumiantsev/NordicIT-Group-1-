<?php

require_once 'db.php';

class goods extends database\db{
    function getList(){
        $query = "select * from goods";
        return var_dump("qq");
    }
    function __construct() {
        var_dump(parent::connect('localhost'));
        return $this -> getList();
      }
}

//тест подключения
//$test = new goods();