<?php
include "db.php";
include "header.php";                    
?>
<style>
.row-checkout {
  display: -ms-flexbox; /* IE10 */
  display: flex;
  -ms-flex-wrap: wrap; /* IE10 */
  flex-wrap: wrap;
  margin: 0 -16px;
}

.col-25 {
  -ms-flex: 25%; /* IE10 */
  flex: 25%;
}

.col-50 {
  -ms-flex: 50%; /* IE10 */
  flex: 50%;
}

.col-75 {
  -ms-flex: 75%; /* IE10 */
  flex: 75%;
}

.col-25,
.col-50,
.col-75 {
  padding: 0 16px;
}

.container-checkout {
  background-color: #f2f2f2;
  padding: 5px 20px 15px 20px;
  border: 1px solid lightgrey;
  border-radius: 3px;
}

input[type=text] {
  width: 100%;
  margin-bottom: 20px;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 3px;
}

label {
  margin-bottom: 10px;
  display: block;
}

.icon-container {
  margin-bottom: 20px;
  padding: 7px 0;
  font-size: 24px;
}

.checkout-btn {
  background-color: #4CAF50;
  color: white;
  padding: 12px;
  margin: 10px 0;
  border: none;
  width: 100%;
  border-radius: 3px;
  cursor: pointer;
  font-size: 17px;
}

.checkout-btn:hover {
  background-color: #45a049;
}



hr {
  border: 1px solid lightgrey;
}

span.price {
  float: right;
  color: grey;
}

/* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other (also change the direction - make the "cart" column go on top) */
@media (max-width: 800px) {
  .row-checkout {
    flex-direction: column-reverse;
  }
  .col-25 {
    margin-bottom: 20px;
  }
}
</style>

					
<section class="section">       
	<div class="container-fluid">
		<div class="row-checkout">
		<?php
		
		// add the product in order table
		if(isset($_SESSION["uid"])){
			$i=1;
			$uid = $_SESSION["uid"];
			$total=0;
			$total_count=$_POST['total_count'];
			while($i <= $total_count){
				$product_id_ = $_POST['product_id_'.$i];
				//echo "$product_id_";
				$item_name_ = $_POST['item_name_'.$i];
				$amount_ = $_POST['amount_'.$i];
				$actualamount_ = $_POST['actualamount_'.$i];
				$discount_ = $_POST['discount_'.$i];
				$quantity_ = $_POST['quantity_'.$i];
				//echo "$amount_";		
				$getresult = mysqli_query($con,"SELECT * FROM `product` WHERE `product_id` = $product_id_");
				$qty = mysqli_fetch_row($getresult);
				echo "$qty[5]";
				
				if ($quantity_ < $qty) {
					
					$result = mysqli_query($con,"SELECT `customer_id` FROM `customer` WHERE `person_id` = $uid");
					$row = mysqli_fetch_row($result);
					echo "$row[0]";
				
					$result1 = mysqli_query($con,"SELECT * FROM `address` WHERE `customer_id` = $row[0]");
					$row1 = mysqli_fetch_row($result1);
					echo "$row[0]";
					
					$date = date("Y-m-d");
					$sql2 = "INSERT INTO `orders` (`orderDate`, `orderQuantity`,`orderTotalCost`, `orderDiscount`, `orderStatus`, `customer_id`, `seller_id`,`addressLine1`, `addressLine2`, `country`,	`city`, `statte`, `zipcode`, `product_id`) VALUES
						('$date','$quantity_', '$amount_', '$discount_','Success', '$row[0]','1','$row1[1]','$row1[2]','$row1[3]','$row1[4]','$row1[5]','$row1[6]', $product_id_)";	
					if(mysqli_query($con,$sql2)){
						$del_sql="DELETE from cart where user_id=$row[0]";
						if(mysqli_query($con,$del_sql)){
							$up_qty = $qty[5] - $quantity_;
							echo "$up_qty";
							$up_sql = "UPDATE product SET quantity = '$up_qty' WHERE product_id = '$product_id_'";
							if(mysqli_query($con,$up_sql)){
								echo"<script>window.location.href='store.php'</script>";
							}
						}else{
							echo(mysqli_error($con));
						}
					}else{
						echo(mysqli_error($con));
					}
					
				}else
					echo(mysqli_error($con));
				$i++;	
			}
		}
		?>

		</div>
	</div>
</section>
		
<?php
include "footer.php";
?>