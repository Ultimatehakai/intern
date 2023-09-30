<?php

$conn=new mysqli("localhost","root","","acme_jul");
if($conn->connect_error){
    echo "Connection Failed";
    die;
}


?>