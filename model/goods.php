<?php
include_once 'db.php';

class goods extends db{
    
   
    function getItem($id){
        $linkFromParent = parent::extendConnect('localhost');
        $query = "select * from goods where id=".$id;
        $result = $linkFromParent->query($query); 
        return $result;
    }
    function getList(){
        $linkFromParent = parent::extendConnect('localhost');
        $query = "select * from goods";
        $result = $linkFromParent->query($query); 
        return $result;
    }
    function getCategory($type){
       
        $linkFromParent = parent::extendConnect('localhost');
        $query = 'select * from goods WHERE category="'.$type.'"';
        $result = $linkFromParent->query($query); 
        return $result;
    }
    function getCountCategory($type){
        $linkFromParent = parent::extendConnect('localhost');
        $sql = 'SELECT COUNT(*) FROM goods WHERE category="'.$type.'"';
        $result = mysqli_query($linkFromParent, $sql); 
        if($result){
            $s = $result->fetch_assoc();
            return $s["COUNT(*)"];
        }else echo $sql;
    }
    
}
if($_POST){
    $item  = new goods;
     $i = $item -> getItem($_POST['id']);
     while ($row = $i->fetch_assoc()) {
        echo json_encode($row);
    }
}
     