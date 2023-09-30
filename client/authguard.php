<?php
session_start();
if (!isset($_SESSION['login_status'])){
    echo "Login First, Unauthorised Attempt";
    die;
}
if($_SESSION['login_status']==false){
    echo "Failed Login Attemt, Illegal Access";
    die;
}

if($_SESSION['usertype']!='client'){
    echo "Unauthorized to access this resource";
    die;
}



?>