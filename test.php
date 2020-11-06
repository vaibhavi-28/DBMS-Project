
<!-- $sql = "SELECT o.orderQuanity, o.orderTotalCost, o.orderDiscount, o.orderStatus, per.firstName, per.lastName, o.addressLine1, o.addressLine2, o.city, o.statte, o.country, o.zipcode FROM orders as o, product as p, person as per WHERE o.customer_id = per.person_id AND o.product_id = p.product_id"; -->

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ecom";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// $sql = "SELECT o.orderQuanity, o.orderTotalCost, o.orderDiscount, o.orderStatus, o.addressLine1, o.addressLine2, o.city, o.statte, o.country, o.zipcode FROM orders as o, product as p WHERE o.product_id = p.product_id";

$sql = "SELECT o.orderDate, o.orderQuantity, o.orderTotalCost, o.orderDiscount, o.orderStatus, o.addressLine1, o.addressLine2, o.city, o.statte, o.country, o.zipcode, p.productTitle, per.firstName, per.lastName FROM orders as o, product as p, person as per WHERE o.product_id = p.product_id AND per.person_id = o.customer_id AND o.seller_id = 1"; 

$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo implode(" ",$row);
    echo "<br>";
  }
} else {
  echo "0 results";
}
$conn->close();
?>