<?php

include "authguard.php";

print_r($_FILES["pdting"]["name"]);

print_r($_FILES["pdting"]["tmp_name"]); 
// tmp_name is use for image file location

$impath="../shared/images/".$_FILES["pdting"]["name"];

move_uploaded_file($_FILES["pdting"]["tmp_name"],$impath);

include_once "../shared/connection.php";



$status=mysqli_query($conn,"insert into product(name,price,detail,impath,uploaded_by)  
values('$_POST[name]',$_POST[price],'$_POST[detail]','$impath',$_SESSION[userid])");

if($status){
   echo "Product uploaded Successfully";
}
else{
   echo "Failed to upload product";
   echo mysqli_error($conn);
}

?>

