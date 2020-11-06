<?php
session_start();
$ip_add = getenv("REMOTE_ADDR");
include "db.php";
	$category_query = "SELECT * FROM category";
	$run_query = mysqli_query($con,$category_query) or die(mysqli_error($con));
	echo "  
            <div class='aside'>
							<h3 class='aside-title'>Categories</h3>
							<div class='btn-group-vertical'>
	";
	
	if(mysqli_num_rows($run_query) > 0){
        $i=1;
		while($row = mysqli_fetch_array($run_query)){
            
			$cid = $row["category_id"];
			$cat_name = $row["categoryName"];
			$isCategory = "1";
			echo "
					
                    <div type='button' class='btn navbar-btn category' cid='$cid' iscategory='$isCategory'>
									<a href='#'>
										<span  ></span>
										<b>$cat_name</b>
									</a>
								</div>
                    
			";
			$subcategory_query = "SELECT * FROM subcategory WHERE category_id = $cid";
			$run_query1 = mysqli_query($con,$subcategory_query) or die(mysqli_error($con));
			echo "  
            <div class='aside'>
							<div class='btn-group-vertical'>
			";
            if(mysqli_num_rows($run_query1) > 0){
				$j=0;
				while($row1 = mysqli_fetch_array($run_query1)){
					$cid = $row1["subcategory_id"];
					$cat_name = $row1["subcategoryName"];
					$isCategory = "2";

					
					$sql1 = "SELECT COUNT(*) AS count_items1 FROM product WHERE subcategory_id = $cid";
					$query1 = mysqli_query($con,$sql1)or die(mysqli_error($con));
					$row1 = mysqli_fetch_array($query1);
					$count1 = $row1["count_items1"];
					$j++;
					echo "
					
							<div type='button' class='btn navbar-btn category' cid='$cid' iscategory='$isCategory'>
									<a href='#'>
										<span  ></span>
										$cat_name
										<small class='qty'>($count1)</small>
									</a>
								</div>
                    
					";
				}
			}
			$i++;
		}
		echo "</div>";
	}
