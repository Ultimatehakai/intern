<?php
include "authguard.php";

print_r($_FILES["pdtimg"]["name"]);

print_r($_FILES["pdtimg"]["tmp_name"]);

//"abc"."def" = abcdef

$impath="../shared/images/".$_FILES["pdtimg"]["name"];

move_uploaded_file($_FILES["pdtimg"]["tmp_name"],$impath);

include_once "../shared/connection.php";

$status=mysqli_query($conn,"insert into product(name,price,detail,impath,uploaded_by)  values('$_POST[name]',$_POST[price],'$_POST[detail]','$impath',$_SESSION[userid])");
if($status){
    echo "Product uploaded Successfully";
}
else{
    echo "Failed to upload product";
    echo mysqli_error($conn);
}

?>