<?php
include "authguard.php";

$impath = "../shared/images/".$_FILES["pdtimg"]["name"];

if (move_uploaded_file($_FILES["pdtimg"]["tmp_name"], $impath)) {
    // Include the database connection
    include_once "../shared/connection.php";

    // Retrieve and sanitize form data
    $name = $_POST['name'];
    $price = $_POST['price'];
    $detail = $_POST['detail'];
    $imp = $impath;
    $pid = $_POST['id']; // Assuming this is the product ID to update

    // Prepare an SQL statement using a prepared statement for UPDATE

    $stmt = mysqli_prepare($conn, "UPDATE product SET name='$name', price='$price', detail='$detail', impath='$imp' WHERE pid='$pid' ");

    if (mysqli_stmt_execute($stmt)) {
        echo "\n impath: " . $impath;
        echo "\n imp: " . $imp;
        echo "\n Product updated successfully.";
    } else {
        echo "Failed to update product: " . mysqli_error($conn);
    }}
?>
