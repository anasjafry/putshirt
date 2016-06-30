<?php

session_start();
//terminate if all sessions are not properly set
if(!isset($_SESSION['cart']) || !isset($_SESSION['mobile']) || !isset($_SESSION['email']) || !isset($_SESSION['name']) || !isset($_SESSION['address']))
	die('Something went wrong');

$otp = $_POST['otp'];
$link = mysqli_connect("localhost", "root", "", "putshirt");
$query = "SELECT otp FROM otplist WHERE mobileNumber='{$_SESSION['mobile']}'";
$obj = $link->query($query);
$row = $obj->fetch_assoc();
//die($row['otp'].$otp);
if($row['otp']==$otp)
	{
		date_default_timezone_set('Asia/Calcutta');
		$timeStamp = date('H:i:s d M Y');
		$phone = $_SESSION['mobile'];
		$query = "INSERT INTO orderlist (userId, orderDate) VALUES ('{$phone}', '{$timeStamp}')";
		$obj1 = $link->query($query);

		//deleting otp
		$query = "DELETE FROM otplist where mobileNumber='{$_SESSION['mobile']}'";
		$obj2 = $link->query($query);				

		//adding to order details
		$query = "SELECT orderId FROM orderlist WHERE userID='{$_SESSION['mobile']}' AND orderStatus=0";
		$obj3 = $link->query($query);
		$row1 = $obj3->fetch_assoc();
		$oid = $row1['orderId'];
		$i=0;
		while($i<sizeof($_SESSION['cart']))
		{
			$query = "INSERT INTO orderdetails (orderId, itemId, itemQuantity, itemSize) VALUES ('{$oid}','{$_SESSION['cart'][$i][0]}','{$_SESSION['cart'][$i][1]}', '{$_SESSION['cart'][$i][2]}')";	
			
			$obj4 = $link->query($query);		
			$i++;
		}

		$_SESSION['ordersuccess'] = 'Your Order has been successfully placed with order id: '.$oid;	
		

	}	

else
	{
		$_SESSION['otpErr'] = "Correctly Enter the OTP send to your phone" ;
		die('OTP Error');
	}

//echo'<script>window.location="cart.php";</script>';

?>