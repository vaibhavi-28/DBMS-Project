<?php
session_start();
$ip_add = getenv("REMOTE_ADDR");
include "db.php";
if(isset($_POST["getProduct"])){
	$limit = 9;
	if(isset($_POST["setPage"])){
		$pageno = $_POST["pageNumber"];
		$start = ($pageno * $limit) - $limit;
	}else{
		$start = 0;
	}
	//get the products for selected category
	$product_query = "SELECT * FROM product,category,subcategory WHERE category.category_id = subcategory.category_id AND product.subcategory_id = subcategory.subcategory_id LIMIT $start,$limit";
	$run_query = mysqli_query($con,$product_query) or die(mysqli_error($con));
	if(mysqli_num_rows($run_query) > 0){
		while($row = mysqli_fetch_array($run_query)){
			$pro_id    = $row['product_id'];
			$pro_cat   = $row['subcategory_id'];
			//$pro_title = $row['producdTitle'];
			$pro_price = $row['productCost'];
			$pro_acprice = $row['productActualCost'];
			$pro_disount = $row['productDiscount'];
			$pro_image = $row['productImage'];
            
            $cat_name = $row["categoryName"];
			echo "
				
                        
                        <div class='col-md-4 col-xs-6' >
								<a href='product.php?p=$pro_id'><div class='product'>
									<div class='product-img'>
										<img src='images/$pro_image' style='max-height: 170px;' alt=''>
										<div class='product-label'>
											<span class='sale'>-30%</span>
											<span class='new'>NEW</span>
										</div>
									</div></a>
									<div class='product-body'>
										<p class='product-category'>$cat_name</p>
										<h3 class='product-name header-cart-item-name'><a href='product.php?p=$pro_id'></a></h3>
										<h4 class='product-price header-cart-item-info'>$pro_price<del class='product-old-price'>$pro_acprice</del></h4>
										<h5 class='product-category'>Discount Price</h5><h4 class='product-price header-cart-item-info'>$pro_disount</h4>
										<div class='product-rating'>
											<i class='fa fa-star'></i>
											<i class='fa fa-star'></i>
											<i class='fa fa-star'></i>
											<i class='fa fa-star'></i>
											<i class='fa fa-star'></i>
										</div>
										<div class='product-btns'>
											<button class='add-to-wishlist'><i class='fa fa-heart-o'></i><span class='tooltipp'>add to wishlist</span></button>
											<button class='add-to-compare'><i class='fa fa-exchange'></i><span class='tooltipp'>add to compare</span></button>
											<button class='quick-view'><i class='fa fa-eye'></i><span class='tooltipp'>quick view</span></button>
										</div>
									</div>
									<div class='add-to-cart'>
										<button pid='$pro_id' id='product' class='add-to-cart-btn block2-btn-towishlist' href='#'><i class='fa fa-shopping-cart'></i> add to cart</button>
									</div>
								</div>
							</div>
                        
			";
		}
	}
}
?>