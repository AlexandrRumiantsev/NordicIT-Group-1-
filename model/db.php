<?php


    class db {
    
      private $login = 'root';
      private $pass = 'root'; 
      private $name_base = 'magazine_lesson';
      
      function connect($host) {
        $link = new mysqli( $host, $this->login, $this->pass, $this->name_base );
        return $link;
      }
      function extendConnect($host) {
        $link = new mysqli( $host, $this->login, $this->pass, $this->name_base );
        var_dump($link);
      }

      function __construct($host) {
        return $this -> connect($host);
      }
    } 

//подключения c конструктором
//$test = new db('localhost');

//подключения без конструкта
//$test = new db();
//$test -> connect('localhost');
