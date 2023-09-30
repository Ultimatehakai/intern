<?php

$uname=$_POST['uname'];
$upass=$_POST['upass1'];

$hash_pwd=md5($upass);
$usertype=$_POST['usertype'];

include_once "connection.php";

$status=mysqli_query($conn, "insert into user(username,password,usertype) values('$uname','$hash_pwd','$usertype')");
if($status){
    echo"User Signed Success";
}
else{
    echo "Signed failed";
    echo mysqli_error($conn);
}

?> 

