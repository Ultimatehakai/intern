<?php

session_start();
$_SESSION['login_status']=false;
$uname=$_POST['uname'];
$upass=$_POST['upass'];

$hash_pwd=md5($upass);

include_once "connection.php";


$sql_result=mysqli_query($conn,"select * from user where username='$uname' and password='$hash_pwd'");

if(mysqli_num_rows($sql_result)==0)
{
    echo"<h1> Invalid crendentials</h1>";
    die;
}
    
    echo "<h1>Login successful</h1>";
    $row=mysqli_fetch_assoc($sql_result);
    print_r($row);

    $_SESSION['login_status']=true;
    $_SESSION['usertype']=$row['usertype'];
    $_SESSION['userid']=$row['userid'];
    
    if($row['usertype']=="vendor"){
        header("location:../vendor/home.php");
    }
    else if($row['usertype']=="client"){
        header("location:../client/home.php");

    }



?>