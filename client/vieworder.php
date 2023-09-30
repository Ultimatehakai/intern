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
            .title{
                text-align: center;
                background-color: palevioletred;
                
            }
        </style>
    </head>
    <body>
   
    </body>

</html>

<?php


include_once "../shared/connection.php";

// to display on vieworder page
$sql_result=mysqli_query($conn,"select * from cart 
join product on cart.pid=product.pid 
where cart.userid=$_SESSION[userid] ");

// Fill database

// Prepare the SQL query to fetch the data from the cart table
$sql = "select * from cart join product on cart.pid=product.pid ";

// Execute the SQL query
$result = mysqli_query($conn, $sql);

// Iterate over the results of the query
while ($row = mysqli_fetch_assoc($result)) {
    $cartid = $row['cartid'];
    $userid = $row['userid'];
    $name = $row['name'];
    $price = $row['price'];
    $impath = $row['impath'];
    
    // Check if the data already exists in the productorder table
    $checkQuery = "SELECT * FROM productorder WHERE cartid='$cartid'";
    $checkResult = mysqli_query($conn, $checkQuery);

    if (mysqli_num_rows($checkResult) == 0) {
        // Data doesn't exist, insert it
        $status = mysqli_query($conn, "INSERT INTO productorder(`cartid`,`userid`,`name`,`price`,`impath`)
        VALUES ('$cartid','$userid','$name','$price','$impath')");

        if (!$status) {
            // Handle the error
            echo "Error inserting Cart ID: " . mysqli_error($conn);
        }
    }
}

while($row=mysqli_fetch_assoc($sql_result))
{
  
    echo "<div class='card p-4 '>
    <div class='name display-2'>$row[name]</div>
    <div class='price display-5 text-danger'>Rs.$row[price]</div>
    <img class='pdtimg' src='$row[impath]'>
    <div class='detail'>$row[detail]</div>

    </div>";

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <style>
.title {
    height:60px ;
    position: fixed;
    bottom: 0;
    left: 0;
    right: 0;
    text-align: center;
    background-color: palevioletred;
}

</style>
</head>
<body>
<footer>
        <p class="title" >Free delivery on every Product<br> &copy;2023 Your Online Store</p>
    </footer>
</body>
</html>