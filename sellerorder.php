<?php 
session_start();
?>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

		<title>Online Shopping</title>

		<!-- Google font -->
		<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

		<!-- Bootstrap -->
		<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css"/>

		<!-- Slick -->
		<link type="text/css" rel="stylesheet" href="css/slick.css"/>
		<link type="text/css" rel="stylesheet" href="css/slick-theme.css"/>

		<!-- nouislider -->
		<link type="text/css" rel="stylesheet" href="css/nouislider.min.css"/>

		<!-- Font Awesome Icon -->
		<link rel="stylesheet" href="css/font-awesome.min.css">

		<!-- Custom stlylesheet -->
		<link type="text/css" rel="stylesheet" href="css/style.css"/>
		<link type="text/css" rel="stylesheet" href="css/accountbtn.css"/>
		
		
		
         
		
		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
    <style>
	table{
  width:100%;
  table-layout: fixed;
}
.tbl-header{
  background-color: rgba(255,255,255,0.3);
 }
.tbl-content{
  height:300px;
  overflow-x:auto;
  margin-top: 0px;
  border: 1px solid rgba(255,255,255,0.3);
}
th{
  padding: 20px 15px;
  text-align: left;
  font-weight: 500;
  font-size: 12px;
  color: #fff;
  text-transform: uppercase;
}
td{
  padding: 15px;
  text-align: left;
  vertical-align:middle;
  font-weight: 300;
  font-size: 12px;
  color: #fff;
  border-bottom: solid 1px rgba(255,255,255,0.1);
}





        #navigation {
          background: #FF4E50;  /* fallback for old browsers */
            background: -webkit-linear-gradient(to right, #F9D423, #FF4E50);  /* Chrome 10-25, Safari 5.1-6 */
            background: linear-gradient(to right, #F9D423, #FF4E50); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

          
        }
        #header {
  
            background: #780206;  /* fallback for old browsers */
            background: -webkit-linear-gradient(to right, #061161, #780206);  /* Chrome 10-25, Safari 5.1-6 */
            background: linear-gradient(to right, #061161, #780206); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

  
        }
        #top-header {
              
  
            background: #870000;  /* fallback for old browsers */
            background: -webkit-linear-gradient(to right, #190A05, #870000);  /* Chrome 10-25, Safari 5.1-6 */
            background: linear-gradient(to right, #190A05, #870000); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */


        }
        #footer {
            background: #7474BF;  /* fallback for old browsers */
            background: -webkit-linear-gradient(to right, #348AC7, #7474BF);  /* Chrome 10-25, Safari 5.1-6 */
            background: linear-gradient(to right, #348AC7, #7474BF); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */


          color: #1E1F29;
        }
        #bottom-footer {
            background: #7474BF;  /* fallback for old browsers */
            background: -webkit-linear-gradient(to right, #348AC7, #7474BF);  /* Chrome 10-25, Safari 5.1-6 */
            background: linear-gradient(to right, #348AC7, #7474BF); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
          

        }
        .footer-links li a {
          color: #1E1F29;
        }
        .mainn-raised {
            
            margin: -7px 0px 0px;
            border-radius: 6px;
            box-shadow: 0 16px 24px 2px rgba(0, 0, 0, 0.14), 0 6px 30px 5px rgba(0, 0, 0, 0.12), 0 8px 10px -5px rgba(0, 0, 0, 0.2);

        }
       
        .glyphicon{
    display: inline-block;
    font: normal normal normal 14px/1 FontAwesome;
    font-size: inherit;
    text-rendering: auto;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
    }
    .glyphicon-chevron-left:before{
        content:"\f053"
    }
    .glyphicon-chevron-right:before{
        content:"\f054"
    }
        

       
        
        </style>

    </head>
	<body>
		<!-- HEADER -->
		<header>
			<!-- MAIN HEADER -->
			<div id="header">
				<!-- container -->
				<div class="container">
					<!-- row -->
					<div class="row">
						<!-- LOGO -->
						<div class="col-md-3">
							<div class="header-logo">
								<a href="#" class="logo">
								<font style="font-style:normal; font-size: 33px;color: aliceblue;font-family: serif">
                                        Online Shop
                                    </font>
									
								</a>
							</div>
						</div>
						<!-- /LOGO -->
						
					</div>
					<!-- row -->
				</div>
				<!-- container -->
			</div>
			<!-- /MAIN HEADER -->
		</header>
		<!-- /HEADER -->
		<html>
		<head>
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<style>
			body {
				margin: 0;
				font-family: Arial, Helvetica, sans-serif;
			}

			.topnav {
				overflow: hidden;
				background-color: #ssssss;
			}

			.topnav a {
				float: left;
				color: #333;
				text-align: center;
				padding: 14px 16px;
				text-decoration: none;
				font-size: 20px;
			}

			.topnav a:hover {
				background-color: #ssssss;
				color: white;
			}

			.topnav a.active {
				color: white;
			}
			</style>
		</head>
		<body>

		<div class="topnav">
			<a href="seller.php">Home</a>
			<a href="sellerproduct.php">Your Products</a>
			<a class="active" href="sellerorder.php">Your Orders</a>
		</div>
		
<?php 
include "db.php";
$person_id = $_SESSION['uid'];

echo '
		<div class="tbl-header">
		<table cellpadding="0" cellspacing="0" border="0">
        <thead>
            <tr>
                <th>Product Name</th>
                <th>Quantity</th>
                <th>Total Cost</th>
                <th>Total Discount</th>
                <th>Order Date</th>
                <th>Buyer Name</th>
                <th>Address Line 1</th>
                <th>Address Line 2</th>
                <th>City</th>
                <th>State</th>
                <th>Country</th>
                <th>Pincode</th>
                <th>Order Status</th>
            </tr>
        </thead>
        <tbody>
';


$sql = "SELECT o.orderDate, o.orderQuantity, o.orderTotalCost, o.orderDiscount, o.orderStatus, o.addressLine1, o.addressLine2, o.city, o.statte, o.country, o.zipcode, p.productTitle, per.firstName, per.lastName FROM orders as o, product as p, person as per WHERE o.product_id = p.product_id AND per.person_id = o.customer_id AND o.seller_id = $person_id"; 
$run_query = mysqli_query($con,$sql) or die(mysqli_error($con));
while($row=mysqli_fetch_array($run_query)){
		$name = $row['firstName'] . " " . $row["lastName"];
		echo "
			<tr>
                <td>$row[productTitle]</td>
                <td>$row[orderQuantity]</td>
                <td>$row[orderTotalCost]</td>
                <td>$row[orderDiscount]</td>
                <td>$row[orderDate]</td>
                <td>$name</td>
                <td>$row[addressLine1]</td>
                <td>$row[addressLine2]</td>
                <td>$row[city]</td>
                <td>$row[statte]</td>
                <td>$row[country]</td>
                <td>$row[zipcode]</td>
                <td>$row[orderStatus]</td>
            </tr>
		";
	}

	echo "
	</tbody>
	</table>
	</div>
	";
?>
