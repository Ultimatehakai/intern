<?php 

include "authguard.php";
include "menu.html";

?>

<!DOCTYPE html>
<html lang="en">
<head>
   
    <title>vendor home page</title>
</head>
<body>
<div class="d-flex justify-content-center align-items-center vh-100">
    <form action="upload.php" class="w-27 bg-warning p-5 "method="post" enctype="multipart/form-data">

    <h3 class="text-center">Upload product</h3>

    <input class="form-control mt-2" type="text" name="name" placeholder="product name">
    <input class="form-control mt-2" type="number" name="price" placeholder="product price">
    <input class="form-control mt-2" type="text" name="detail" placeholder="product discription" cols="30"
    rows="5"></textarea>
    <input class="form-control mt-2" type="file" name="pdting" accept=".jpg,.png">
    <div class="text-center mt-3">
        <button class="btn btn-danger">upload</button>
    </div>
    </form>
   </div>

</body>
</html>