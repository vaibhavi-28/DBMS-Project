<?php
session_start();
include "db.php";

if(isset($_POST['addressLine1']) && isset($_POST['addressLine2']) && isset($_POST['city']) && isset($_POST['state']) && isset($_POST['country']) && isset($_POST['zipCode']) )
{
    $add1 = $_POST['addressLine1'];
    $add2 = $_POST['addressLine2'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $country = $_POST['country'];
    $zipCode = $_POST['zipCode'];
    $pid = $_SESSION['uid'];
	//update address 
    $sql = "UPDATE address SET addressLine1 = '$add1', addressLine2 = '$add2', city = '$city', statte = '$state', country = '$country', zipcode = $zipCode WHERE customer_id = ( SELECT customer_id FROM customer WHERE person_id = $pid)";

    if ($con->query($sql) == TRUE) {
        echo "success";
    } else {
        echo "Error updating record: " . $con->error;
    }
}
else {
    echo "Enter Values Correctly";
}
?>