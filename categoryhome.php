<?php
session_start();
$ip_add = getenv("REMOTE_ADDR");
include "db.php";

if(isset($_POST["categoryhome"])){
	//create menu bar for different categorys
	$category_query = "SELECT * FROM category WHERE category_id!=10";
    
	$run_query = mysqli_query($con,$category_query) or die(mysqli_error($con));
	echo "		        
				<!-- responsive-nav -->
				<div id='responsive-nav'>
					<!-- NAV -->
					<ul class='main-nav nav navbar-nav'>
                    <li class='active'><a href='index.php'>Home</a></li>
                    <li><a href='store.php'>Electronics</a></li>
	";
	if(mysqli_num_rows($run_query) > 0){
		while($row = mysqli_fetch_array($run_query)){
			$cid = $row["category_id"];
			$cat_name = $row["categoryName"];
			$iscategory = "1";
			echo "<li class='categoryhome' cid='$cid' iscategory='$iscategory'><a href='store.php'>$cat_name</a></li>";
		}
        
		echo "</ul>
					<!-- /NAV -->
				</div>
				<!-- /responsive-nav -->
               
			";
	}
}