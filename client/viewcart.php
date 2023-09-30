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
            .quantity{
        width: 5px;
        height: 20px;
        text-align: center;
    
    }

        </style>
    </head>
    <body>
        <script>
            function confirmDelete(cartid){
                res=confirm("Are sure you want to delete?")
                if(res){
                    window.location=`deletecart.php?cartid=${cartid}`;
                }
            }
        </script>
        
    </body>

</html>


<?php

include_once "../shared/connection.php";

$sql_result=mysqli_query($conn,"select * from cart 
join product on cart.pid=product.pid 
where cart.userid=$_SESSION[userid] ");

$total=0;
while($row=mysqli_fetch_assoc($sql_result)){
  
    
    $total+=$row['price'] ;

  
    echo "<div class='card p-4 '>
    <div class='name display-2'>$row[name]</div>
    <button onclick=confirmDelete($row[cartid]) class='delete btn'>X</button>
    <div class='price display-5 text-danger'>Rs.$row[price]</div>
    <img class='pdtimg' src='$row[impath]'>
    <div class='detail'>$row[detail]</div>
    <br>


    <label for='quantity'>Quantity:</label>
    <input type='number' id='quantity' name='quantity' min='1' value='1'>
    <input type='' name='product_price' value='$row[price]'>
    <span id='display'></span>


    </div>";

}
echo "<div class='bg-primary display-3'>

    <div class='price' id='price'>
    check out Price
    <span class='text-warning'>RS.$total</span>
    
    <div class=pOrder>
    <form action='order.php' method='post'>   
       <button class='btn btn-warning p-3'> Place Order</button>
    </div></form>
 </a>

    </div>
    </div>";

?>