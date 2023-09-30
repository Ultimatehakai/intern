<?php

include "authguard.php";

$pid=$_GET['pid'];
$userid=$_SESSION['userid'];

include "../shared/connection.php";

$status=mysqli_query($conn,"insert into cart(userid,pid)values($userid,$pid)");

if($status){
    echo "Add to cart successful";
    header("location:home.php");
}
else
{
    echo "failed to Add to cart";
    echo mysqli_error($conn);
}



?>