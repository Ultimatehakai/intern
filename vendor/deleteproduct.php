<?php
include "authguard.php";
$pid=$_GET['pid'];
include_once "../shared/connection.php";

$status=mysqli_query($conn,"delete from product where pid=$pid");
if($status){
    echo "Cart item removed successfully";
    header("location:view.php");
}
else{
    echo "Failed to delete product item";
    echo mysqli_error($conn);
}

?>