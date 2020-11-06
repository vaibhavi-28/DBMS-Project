<?php
session_start();
include "db.php";
if (isset($_POST["f_name"])) {
	$f_name = $_POST["f_name"];
	$m_name = $_POST["m_name"];
	$l_name = $_POST["l_name"];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$repassword = $_POST['repassword'];
	$mobile = $_POST['mobile'];
	$address1 = $_POST['address1'];
	$address2 = $_POST['address2'];
	$city = $_POST['city'];
	$state = $_POST['state'];
	$country = $_POST['country'];
	$zipcode = $_POST['zipcode'];

	$name = "/^[a-zA-Z ]+$/";
	$emailValidation = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9]+(\.[a-z]{2,4})$/";
	$number = "/^[0-9]+$/";

	if(empty($f_name) || empty($l_name) || empty($email) || empty($password) || empty($repassword) ||
	empty($mobile) || empty($address1) || empty($city) || empty($state) || empty($country) || empty($zipcode) ){
		
		echo "
			<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>PLease Fill all fields..!</b>
			</div>
		";
		exit();
	} else {
		if(!preg_match($name,$f_name)){
		echo "
			<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>this $f_name is not valid..!</b>
			</div>
		";
		exit();
	}
	if(!preg_match($name,$l_name)){
		echo "
			<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>this $l_name is not valid..!</b>
			</div>
		";
		exit();
	}
	if(!preg_match($emailValidation,$email)){
		echo "
			<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>this $email is not valid..!</b>
			</div>
		";
		exit();
	}
	if(strlen($password) < 1 ){
		echo "
			<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>Password is weak</b>
			</div>
		";
		exit();
	}
	if(strlen($repassword) < 1 ){
		echo "
			<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>Password is weak</b>
			</div>
		";
		exit();
	}
	if($password != $repassword){
		echo "
			<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>password is not same</b>
			</div>
		";
	}
	if(!preg_match($number,$mobile)){
		echo "
			<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>Mobile number $mobile is not valid</b>
			</div>
		";
		exit();
	}
	if(!(strlen($mobile) == 11)){
		echo "
			<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>Mobile number must be 10 digit</b>
			</div>
		";
		exit();
	}
	if(!(strlen($zipcode) == 6)){
		echo "
			<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>Zipcode must be 6 digit</b>
			</div>
		";
		exit();
	}
	if(!preg_match($name,$country)){
		echo "
			<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>this $country is not valid..!</b>
			</div>
		";
		exit();
	}
	if(!preg_match($name,$city)){
		echo "
			<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>this $city is not valid..!</b>
			</div>
		";
		exit();
	}
	if(!preg_match($name,$state)){
		echo "
			<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>this $state is not valid..!</b>
			</div>
		";
		exit();
	}
	//existing email address in our database
	$sql = "SELECT person_id FROM person WHERE email = '$email' LIMIT 1" ;
	$check_query = mysqli_query($con,$sql);
	$count_email = mysqli_num_rows($check_query);
	if($count_email > 0){
		echo "
			<div class='alert alert-danger'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>Email Address is already available Try Another email address</b>
			</div>
		";
		exit();
	}
	else {
		// create new record for person
		$date = date("Y-m-d");
		$sql = "INSERT INTO `person` (`firstName`, `middleName`,`lastName`, `email`, `password`, `mobileNo`,`registrationDate`) VALUES
		('$f_name','$m_name', '$l_name', '$email','$password', '$mobile', '$date')";	
		$run_query = mysqli_query($con,$sql);

		$_SESSION["uid"] = $person_id;
		$_SESSION["name"] = $f_name;
		$ip_add = getenv("REMOTE_ADDR");
		$sql = "UPDATE cart SET user_id = '$_SESSION[uid]' WHERE ip_add='$ip_add' AND user_id = -1";
		if(mysqli_query($con,$sql)){
			echo "register_success";
			echo "<script> location.href='store.php'; </script>";
		}
		$result = mysqli_query($con,"SELECT `person_id` FROM `person` WHERE `email` = '$email'");
		$row = mysqli_fetch_row($result);
		echo $row[0];
		
		$sql3 = "INSERT INTO `customer`(`person_id`) VALUES('$row[0]')";
		$run_query3 = mysqli_query($con,$sql3);
		
		$sql4 = "INSERT INTO `seller`(`person_id`) VALUES('$row[0]');";
		$run_query4 = mysqli_query($con,$sql4);
		
		$result1 = mysqli_query($con,"SELECT `customer_id` FROM `customer` WHERE `person_id` = '$row[0]'");
		$row1 = mysqli_fetch_row($result1);
		echo $row1[0];
		
		$sql1 = "INSERT INTO `address`(`customer_id`, `addressLine1`, `addressLine2`,`city`,`statte`,`country`,`zipcode`) VALUES
				('$row1[0]', '$address1', '$address2', '$city', '$state', '$country', '$zipcode')";
		$run_query1 = mysqli_query($con,$sql1);
	}
	}
	exit;
}

?>