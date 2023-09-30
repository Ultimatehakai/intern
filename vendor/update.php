<?php

include "authguard.php";
include "menu.html";

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    body {
        background-image: url('../shared/images/updateimg.jpg');
        background-size: cover;
        background-repeat: no-repeat;
        background-attachment: fixed;
        display: ;
    }
</style>

</head>
<body>
    <div class="d-flex justify-content-center align-items-center vh-100">

    <form action="up.php" class="w-25 bg-warning p-4" method="POST" enctype="multipart/form-data">

    <h4 class="text-center">update Product</h4>
        <input class="form-control mt-2" type="text" name="id" placeholder="Product id">
        <input class="form-control mt-2" type="text" name="name" placeholder="Product Name">
        <input class="form-control mt-2" type="number" name="price" placeholder="Product Price">
        <textarea class="form-control mt-2" name="detail" placeholder="Product Description" cols="30" rows="5"></textarea>
        <input class="form-control mt-2" type="file" name="pdtimg" accept=".jpg,.png">
        <div class="text-center mt-3">
            <button class='btn btn-danger'>update</button>
        </div>

    </form>

    </div>
</body>
</html>