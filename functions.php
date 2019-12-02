<?php

function render($view , $arResult){
    $g_root = $_SERVER['DOCUMENT_ROOT'];
    include_once($g_root."/header.php"); 
    include_once($g_root."/view/$view.php");
    include_once($g_root."/footer.php"); 
}