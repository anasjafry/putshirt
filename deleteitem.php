<?php
	
	session_start();
	$itemsize= $_GET['itemsize'];
 	$itemid= $_GET['itemid'];

		$i=0;
		$found=0;

		$size=sizeof($_SESSION['cart']);

		if($size == 1)
		{
			array_pop($_SESSION['cart']);
			unset($_SESSION['cart']);
			echo'<script>window.location="index.php";</script>';
		}

		while($i<$size)
		{
			if ($found)
			{
				$_SESSION['cart'][$i][0]=$_SESSION['cart'][$i+1][0];
				$_SESSION['cart'][$i][1]=$_SESSION['cart'][$i+1][1];
				$_SESSION['cart'][$i][2]=$_SESSION['cart'][$i+1][2];
			}
			elseif($_SESSION['cart'][$i][0]==$itemid && $_SESSION['cart'][$i][2]==$itemsize )
			{
				if($i == $size-1)
					break;

				$found=1;		
				$_SESSION['cart'][$i][0]=$_SESSION['cart'][$i+1][0];
				$_SESSION['cart'][$i][1]=$_SESSION['cart'][$i+1][1];
				$_SESSION['cart'][$i][2]=$_SESSION['cart'][$i+1][2];	
				$size-=1;
			}
			$i++;
		}	
		
		array_pop($_SESSION['cart']);
	
	echo'<script>window.location="cart.php";</script>';
?>