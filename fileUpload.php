<?php
echo 'fileUpload.php';
var_dump($_FILES);
if ( $_FILES['file']['error'] > 0 ){
            echo 'Error: ' . $_FILES['file']['error'] . '<br>';
        }
        else {
            if(move_uploaded_file($_FILES['file']['tmp_name'], 'img/catalog/' . $_FILES['file']['name']))
            {
                echo "File Uploaded Successfully";
            }
        }