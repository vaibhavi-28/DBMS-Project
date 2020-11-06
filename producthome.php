<?php
session_start();
$ip_add = getenv("REMOTE_ADDR");
include "db.php";
if(isset($_POST["getProducthome"])){
	$limit = 5;
	if(isset($_POST["setPage"])){
		$pageno = $_POST["pageNumber"];
		$start = ($pageno * $limit) - $limit;
	}else{
		$start = 6;
	}
	// get products when click on menu bar
	$product_query = "SELECT * FROM product,subcategory WHERE product.subcategory_id = subcategory.subcategory_id LIMIT $start,$limit";
	$run_query = mysqli_query($con,$product_query) or die(mysqli_error($con));
	if(mysqli_num_rows($run_query) > 0){
		while($row = mysqli_fetch_array($run_query)){
			$pro_id    = $row['product_id'];
			$pro_cat   = $row['subcategory_id'];
			$pro_title = $row['productTitle'];
			$pro_price = $row['productCost'];
			$pro_acprice = $row['productActualCost'];
			$pro_image = $row['productImage'];
            $cat_name = $row["subcategoryName"];
			echo "
				
                       <div class='product-widget'>
                                <a href='product.php?p=$pro_id'> 
									<div class='product-img'>
										<img src='images/$pro_image' alt=''>
									</div>
									<div class='product-body'>
										<p class='product-category'>$cat_name</p>
										<h3 class='product-name'><a href='product.php?p=$pro_id'>$pro_title</a></h3>
										<h4 class='product-price'>$pro_price <del class='product-old-price''>$pro_acprice<</del></h4>
									</div></a>
								</div>
                        
			";
		}
	}
}
?>