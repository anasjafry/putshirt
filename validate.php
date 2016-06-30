<?php
session_start();
require 'sms.php';
echo'<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>';

$phoneNumber = $_POST['mobile'];

    if(preg_match('/^\d{10}$/',$phoneNumber)) // phone number is valid
    {
      	$link = mysqli_connect("localhost", "root", "", "putshirt");
      	//$phoneNumber = '0' . $phoneNumber;
      	$query = "SELECT mobileNumber FROM otplist WHERE mobileNumber={$phoneNumber}";
      	$obj = $link->query($query);
      	$row = $obj->fetch_assoc();
      	if(!is_null($row['mobileNumber']))
      	{
      		//resending otp
      	}
      	else
	    {
	      	$otp = rand(1000,9999);
	      	sender($phoneNumber,'Your OTP for putshirt order is '.$otp);
	      	

	    	$query = "INSERT INTO otplist (mobileNumber, otp) VALUES ($phoneNumber, $otp)";
			$obj = $link->query($query);	
    	}
    	$_SESSION['otp'] ="valid";
    }
    else // phone number is not valid
    {
      	$_SESSION['mobileErr'] = "Enter a valid mobile number." ;
    }

      	$_SESSION['mobile'] = $phoneNumber;
		$_SESSION['name'] = $_POST['name'];
		$_SESSION['address'] = $_POST['address'];
		$_SESSION['email'] = $_POST['email'];    

		

		echo'<script>window.location="cart.php";</script>';







/*
$secret = "6LcmqyMTAAAAAKxRPmyx8WMbI8x2KKu0qkPTAvj-";
$useresponse = $_POST['g-recaptcha-response'];

echo'
<script>
	
	function google(secret,userresponse)
	{
		$.post(
				"https://www.google.com/recaptcha/api/siteverify",
				{
					secret:secret,
					response:userresponse
				},
				function(data, status){
				}
			);
		
	}

	google("'.$secret.'", "'.$useresponse.'");
	
</script>';
*/

//Send an SMS to mobile number

?>