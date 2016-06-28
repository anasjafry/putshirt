<?php
	
	session_start();
	$temp=0;
 	$itemid= $_POST['itemid'];
	$itemqty= $_POST['quantity'];
	$itemsize= $_POST['size'];
	if (!isset($_SESSION['cart']))
		$_SESSION['cart']=array(array($itemid,$itemqty,$itemsize));
	else
	{
		$i=0;
		while($i<sizeof($_SESSION['cart']))
		{
			if($_SESSION['cart'][$i][0]==$itemid)
			{
				if($_SESSION['cart'][$i][2]==$itemsize)
				{
					$temp=$_SESSION['cart'][$i][1];
					$temp+=$itemqty;
					$_SESSION['cart'][$i][1]=$temp;
					break;
				}
				else
					{array_push($_SESSION['cart'],array($itemid,$itemqty,$itemsize));	
					break;}
			}
			elseif($i==sizeof($_SESSION['cart'])-1)
				{array_push($_SESSION['cart'],array($itemid,$itemqty,$itemsize));
				break;}
			$i++;
		}
		
	}	
	echo'<script>window.location="index.php";</script>';
?>