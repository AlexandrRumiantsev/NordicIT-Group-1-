<?php
    class db {
    
      private $login = 'alexweber';
      private $pass = '6Exniskay20'; 
      private $name_base = 'magazine_lession';
      
      function connect($host) {
        $link = new mysqli( $host, $this->login, $this->pass, $this->name_base );
        return $link;
      }
      function extendConnect($host) {
        $link = new mysqli( $host, $this->login, $this->pass, $this->name_base );
        return $link;
      }

      function __construct($host='') {
        return $this -> connect($host);
      }
    } 

//подключения c конструктором
//$test = new db('localhost');

//подключения без конструкта
//$test = new db();
//$test -> connect('localhost');
