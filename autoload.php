<?php
$directory = ['model'];


echo '<br>';
    foreach($directory as  $dir){

    $files = array_diff( scandir($dir), array(".", "..") );

    foreach($files as $file){
        include_once "./$dir/$file";
    }
 
}

?>