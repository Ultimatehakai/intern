

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <!-- <div class="logo"> -->
        <h1>Place Your Order</h1>

        </div>
    </header>
    <a  class="view " href="vieworder.php"><h2>view Order</h2></a>
    
    


    <main>
        <section class="order-summary">
            <h2>Order Summary</h2>
            <?php
             include "authguard.php";

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
             $total=0;
             while($row=mysqli_fetch_assoc($sql_result))
             {
                $total+=$row['price'] ;
                 echo "<div class='card p-4 '>
                 <div class='name display-2'>$row[name]</div>
                 
                 <img class='pdtimg' src='$row[impath]'>
                 <div class='detail'>$row[detail]</div>
                
                 <br>
                 <div class='price display-5 text-danger'>Rs.$row[price]</div>
                 </div>";
             
             }
             echo "<div class='bg-primary display-3'>
                <td>
                <div class='price' id='price'>
                Total Price:
                <span class='text-warning'>RS. $total</span></td>
                </div>";
            ?>
          
        </section>
       
        <section class="shipping-details">
            <h2>Shipping Details</h2>
            <form id="shipping-form" onsubmit="return placeOrder()">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>

                <label for="address">Address:</label>
                <textarea id="address" name="address" required></textarea>

                <label for="city">City:</label>
                <input type="text" id="city" name="city" required>

                <label for="zip">ZIP Code:</label>
                <input type="text" id="zip" name="zip" required>

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>

                <label for="phone">Phone:</label>
                <input type="tel" id="phone" name="phone" required>

                <div class="payment-option">
                                            <ul class=" list-unstyled">
                                                <li>
                                                    <label class="custom-control custom-radio  m-b-20">
                                                    
                                              <input type="radio" name="paymentMethod" value="cod" onclick="selectPaymentMethod('cod')"> Cash on Delivery (COD)
                                                    </label>
                                                </li>
                                                <li>
                                                    <label class="custom-control custom-radio  m-b-10">
                                                    <input type="radio" name="paymentMethod" value="gpay" onclick="selectPaymentMethod('gpay') "> Google Pay <img src="../shared/images/gpay.jpg" alt="" width="90"></label>
                                                </li>
                                            </ul>
                                           
                                        </div>

                <button type="submit" href="vieworder.php" onclick="return confirm('Do you want to confirm the order?');" >Place Order</button>
            </form>
        </section>
    </main>
    <style>
        /* your styles go here */
    </style>
    <footer><h3>Free delivery on every Product</h3>
        <p>&copy; 2023. All rights reserved.</p>
    </footer>

    <script>
        function placeOrder() {
          
            alert("Thankyou. Your Order has been palced!");
            return false; 
        }
        function selectPaymentMethod(method) {
                                      if (method === 'cod') {
                                       
                                          alert('You have selected Cash on Delivery.');
                                      } else if (method === 'gpay') {
                                        
                                          alert('You have selected Google Pay.');
                                      }
                                  }
    </script>
</body>
</html>
