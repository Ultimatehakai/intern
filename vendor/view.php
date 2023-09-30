<?php
include "authguard.php";
include "menu.html";
?>

<html>
    <head>
        <style>
            .card{
                width:350px;
                height:fit-content;
                background-color:bisque;
                margin:10px;
                display:inline-block;
            }   
            .delete{
                background:maroon;
                width:fit-content;
                position:absolute;
                top:0;
                right:0;
                color:white;                
            }
            .name{
                text-transform:capitalize;
            }        
            .pdtimg{
                width:100%;
                height:300px;
            }
        </style>
    </head>
    <body>
        
    </body>

</html>

<?php


include_once "../shared/connection.php";

$sql_result=mysqli_query($conn,"select * from product where uploaded_by=$_SESSION[userid]");


while($row=mysqli_fetch_assoc($sql_result)){
  
    echo "<div class='card p-4 '>
    <div class='delete btn'>X</div>
    <div class='name display-2'>$row[name]</div>
    <div class='price display-5 text-danger'>Rs.$row[price]</div>
    <img class='pdtimg' src='$row[impath]'>
    <div class='detail'>$row[detail]</div>

    </div>";

}



?>