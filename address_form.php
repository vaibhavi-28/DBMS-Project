	<div class="wait overlay">
		<div class="loader"></div>
	</div>

    <?php
        include "db.php";
		//get self address if want to change 
        $sql = "SELECT a.addressLine1, a.addressLine2, a.city, a.statte, a.country, a.zipcode FROM address as a WHERE customer_id = ( SELECT customer_id FROM customer WHERE person_id ='$_SESSION[uid]')";
        $query = mysqli_query($con,$sql);
        $row=mysqli_fetch_array($query);
        $add1 = $row['addressLine1'];
        $add2 = $row['addressLine2'];
        $city = $row['city'];
        $state = $row['statte'];
        $country = $row['country'];
        $zipCode = $row['zipcode'];
        echo " 
                <div class='container-fluid'>
					<div class='login-marg'>
                        <form onsubmit='return false' id='address' class='login100-form'>
                            <div class='billing-details jumbotron'>
                                <div class='section-title'>
                                    <h2 class='login100-form-title p-b-49'>Your Address</h2>
                                </div>

                                <div class='form-group'>
                                <label for='addressLine1Txt'>Address Line 1</label>
                                    <input class='input input-borders' type='text' name='addressLine1' value='$add1' id='addressLine1' required>
                                </div>
                                
                                <div class='form-group'>
                                <label for='addressLine2Txt'>Address Line 2</label>
                                    <input class='input input-borders' type='text' name='addressLine2' value='$add2' id='addressLine2' required>
                                </div>

                                <div class='form-group'>
                                <label for='cityTxt'>City</label>
                                    <input class='input input-borders' type='text' name='city' value='$city' id='city' required>
                                </div>

                                <div class='form-group'>
                                <label for='stateTxt'>State</label>
                                    <input class='input input-borders' type='text' name='state' value='$state' id='state' required>
                                </div>

                                <div class='form-group'>
                                <label for='countryTxt'>Country</label>
                                    <input class='input input-borders' type='text' name='country' value='$country' id='country' required>
                                </div>

                                <div class='form-group'>
                                <label for='zipCodeTxt'>Zip Code</label>
                                    <input class='input input-borders' type='text' name='zipCode' value='$zipCode' id='zipCode' required>

                                </div>
                                    <input class='primary-btn btn-block'   type='submit'  Value='Save Chanages'>
                                    <div class='panel-footer'><div class='alert alert-danger'><h4 id='add_e_msg'></h4></div>
                                    </div>                       
                            </div>
                        </form>                           
                    </div>
				    <!-- /row -->
                </div> ";
?>
