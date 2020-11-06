<?php
include "db.php"; 
include "header.php";
session_start();
if (isset($_POST['upload'])) { 

	$person_id = $_SESSION["uid"];
	$productTitle = $_POST["name"];
	$quantity = $_POST["qty"];
	$productDiscount = $_POST["discount"];
	$productActualCost = $_POST["cost"];
	$category = $_POST["category"];
	$subcategory = $_POST["subcategory"];
	//$discription = $_POST["dis"];
	$productCost = $productActualCost - $productDiscount;
	
	$filename = $_FILES["uploadfile"]["name"]; 
    $tempname = $_FILES["uploadfile"]["tmp_name"];     
        $folder = "images/".$filename; 
		
		//add sellers product to the product table
	$result = mysqli_query($con,"SELECT `seller_id` FROM `seller` WHERE `person_id` = $person_id");
	$row = mysqli_fetch_row($result);
	echo "$category";
	echo "$subcategory";
					
	$sql = "INSERT INTO `product` (`productTitle`,`productCost`,`productDiscount`,`productActualCost`,`quantity`,`productImage`,`seller_id`,`subcategory_id`)
			VALUES ('$productTitle','$productCost','$productDiscount','$productActualCost','$quantity','$filename','$row[0]','$subcategory')"; 
    if(mysqli_query($con, $sql)){
			echo "register_success";
	}
	else
		echo(mysqli_error($con));
    if (move_uploaded_file($tempname, $folder))  { 
        $msg = "Image uploaded successfully"; 
		echo"<script>window.location.href='seller.php'</script>";
    }else{ 
            $msg = "Failed to upload image"; 
      } 
}