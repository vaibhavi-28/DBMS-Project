<?php
include 'header.php';
?>
<?php
$ip_add = getenv("REMOTE_ADDR");
include "db.php"; 

$keyword = $_POST["product"];
//get the products for specific keyword 
$sql = "SELECT * FROM product WHERE productTitle LIKE '%$keyword%'";   
$run_query = mysqli_query($con,$sql) or die(mysqli_error($con));
while($row=mysqli_fetch_array($run_query)){
			$pro_id    = $row['product_id'];
			$pro_cat   = $row['subcategory_id'];
			$pro_title = $row['productTitle'];
			$pro_price = $row['productCost'];
			$pro_acprice = $row['productActualCost'];
			$pro_discount = $row['productDiscount'];
			$pro_image = $row['productImage'];
            echo "
					
                        
                        <div class='col-md-2 col-xs-6'>
								<a href='product.php?p=$pro_id'><div class='product'>
									<div class='product-img'>
										<img  src='images/$pro_image' style='max-height: 170px;' alt=''>
										<div class='product-label'>
											<span class='sale'>-30%</span>
											<span class='new'>NEW</span>
										</div>
									</div></a>
									<div class='product-body'>
										<h3 class='product-name header-cart-item-name'><a href='product.php?p=$pro_id'>$pro_title</a></h3>
										<h4 class='product-price header-cart-item-info'>$pro_price<del class='product-old-price'>$pro_acprice</del></h4>
										<h5 class='product-category'>Discount Price</h5><h4 class='product-price header-cart-item-info'>$pro_discount</h4>
										<div class='product-rating'>
											<i class='fa fa-star'></i>
											<i class='fa fa-star'></i>
											<i class='fa fa-star'></i>
											<i class='fa fa-star'></i>
											<i class='fa fa-star'></i>
										</div>
										<div class='product-btns'>
											<button class='add-to-wishlist' tabindex='0'><i class='fa fa-heart-o'></i><span class='tooltipp'>add to wishlist</span></button>
											<button class='add-to-compare'><i class='fa fa-exchange'></i><span class='tooltipp'>add to compare</span></button>
											<button class='quick-view' ><i class='fa fa-eye'></i><span class='tooltipp'>quick view</span></button>
										</div>
									</div>
									<div class='add-to-cart'>
										<button pid='$pro_id' id='product' href='#' tabindex='0' class='add-to-cart-btn'><i class='fa fa-shopping-cart'></i> add to cart</button>
									</div>
								</div>
							</div>
							
			";
		}
?>
<?php
include 'footer.php';
?>