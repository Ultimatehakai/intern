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
            .Acart{
                width: 30px;
                border: solid black 2px max-mime_content_type;
            }
        </style>
    </head>
    <body>
        
    </body>

</html>

<?php

include_once "../shared/connection.php";

$sql_result=mysqli_query($conn,"select * from product ");


while($row=mysqli_fetch_assoc($sql_result)){
  
    echo "<div class='card p-4 '>
    <a href='addcart.php?pid=$row[pid]' class='delete btn'>
        <img class='Acart' src='../shared/assests/icons8-cart-96.png'></a> 
    <div class='name display-2'>$row[name]</div>
    <div class='price display-5 text-danger'>Rs.$row[price]</div>
    <img class='pdtimg' src='$row[impath]'>
    <div class='detail'>$row[detail]</div>

    </div>";

}
?>
<?php
include "footer.php" ;?>