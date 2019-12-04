<?php

function render($view , $arResult='' , $title=''){
    include_once(__DIR__."/header.php"); 
    include_once(__DIR__."/view/$view.php");
    include_once(__DIR__."/footer.php"); 
}

function replacement($str){
      switch($str){
          case "men":
            return "Мужчинам";
          break;

          case "woman":
            return "Женщинам";
          break;

          case "children":
            return "Детям";
          break;

          case "new":
            return "Новинки";
          break;
      }
}
