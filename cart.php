<?php
session_start();
echo'
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Cart</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/price-range.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
	<script src="https://www.google.com/recaptcha/api.js"></script>

</head><!--/head-->

<body>
	<header id="header" style="margin-bottom: 35px;"><!--header-->
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="logo pull-left">
							<a href="index.html"><img src="images/home/logo.png" alt="" /></a>
						</div>
					</div>
					<div class="col-sm-8">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
								<li class="active"><a href="index.php"><i class="fa fa-shopping-bag"></i> Shop Now</a></li>
								<li><a href="cart.php"><i class="fa fa-shopping-cart"></i> Cart</a></li>
								<li><a href="track.php"><i class="fa fa-binoculars"></i> Track Order</a></li>
								<li><a href="about.php"><i class="fa fa-heart"></i> About Us</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->
	</header><!--/header-->
';
if(!isset($_SESSION['cart']))
{
	echo'
		<section>
		<div class="container">
			<div class="row" style="margin-top: 200px;">
				<div class="col-sm-12">
					<div class="features_items"><!--about_us-->						
						<div class="col-sm-12" style="margin-bottom: 60px;">
							<center><p style="font-size: 21px;font-family: "Lato", sans-serif;">Your Cart is Empty!</p></center>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	';
}

else
{
	echo'
	<section id="cart_items">
		<div class="container">
			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<col width="20%">
					<col width="30%">
					<col width="10%">
					<col width="15%">
					<col width="10%">
					<col width="10%">
					<col width="5%">
					<thead>
						<tr class="cart_menu">
							<td class="image">Item</td>
							<td class="description"></td>
							<td class="price">Price</td>
							<td class="quantity">Quantity</td>
							<td class="quantity">Size</td>
							<td class="total">Total</td>
							<td></td>
						</tr>
					</thead>
					<tbody>';
						
						$link = mysqli_connect("localhost", "root", "", "putshirt");
						$i=0;
						while($i<sizeof($_SESSION['cart']))
						{$query = "SELECT itemName, itemId, itemBrief, itemPrice FROM items WHERE itemId='{$_SESSION['cart'][$i][0]}'";
						$obj = $link->query($query);
						$row = $obj->fetch_assoc();
						echo' 
						<tr>
							<td class="cart_product">
								<a href=""><img src="images/items/'.$row['itemId'].'.jpg" width="40%"></a>
							</td>
							<td class="cart_description">
								<h4><a href="">'.$row['itemName'].'</a></h4>
							</td>
							<td class="cart_price">
								<p><i class="fa fa-inr"></i>'.$row['itemPrice'].'</p>
							</td>
							<td class="cart_quantity">
								<div class="cart_quantity_button">
									<p class="cart_total_price">'.$_SESSION['cart'][$i][1].'</p>
								</div>
							</td>
							<td class="cart_total">
								<p class="cart_total_price">'.$_SESSION['cart'][$i][2].'</p>
							</td>
							<td class="cart_total">
								<p class="cart_total_price"><i class="fa fa-inr"></i>'.($row['itemPrice']*$_SESSION['cart'][$i][1]).'</p>
							</td>
							<td class="cart_delete">
								<a class="cart_quantity_delete" href="deleteitem.php?itemid='.$row['itemId'].'&itemsize='.$_SESSION['cart'][$i][2].'"><i class="fa fa-times"></i></a>
							</td>
						</tr>';
						$i++;
						}
						$sum=0;
						$i=0;	
						while($i<sizeof($_SESSION['cart']))
						{
							$sum+=($row['itemPrice']*$_SESSION['cart'][$i][1]);
							$i++;
						}
						echo'
					</tbody>
					<tfoot>
						<tr>
								<td></td><td></td><td></td><td></td>
								<td>
									<p>Grand Total:</p>	
								</td>
								<td class="cart_total_price">
									<p><red><i class="fa fa-inr"></i>'.$sum.'</red></p>
								</td>
								<td></td>
						</tr>
					</tfoot>
				</table>
			</div>
		</div>
	</section> <!--/#cart_items-->

	<section id="do_action">
		<div class="container">

			<div class="row">
				<div class="col-sm-5">
					<h2 class="title text-center">TERMS & CONDITIONS</h2>
					<div class="total_area" style="padding-left: 20px;">
						<p>If you have received a damaged or defective product or if it is not as described, you can raise an exchange request within 30 days of receiving the product.
Successful pick-up of the product is subject to the following conditions being met:
<li>Correct and complete product (with the original brand/article number/undetached MRP tag/product\'s original packaging/freebies and accessories)</li>
<li>The product should be in unused, undamaged and original condition without any stains, scratches, tears or holes.</li>
</p>
					</div>
				</div>
				<div class="col-sm-1">
				</div>
				<div class="col-sm-6">
					<h2 class="title text-center">Delivery Details</h2>
					<div class="total_area" style="padding-left: 20px;">';

							if(!isset($_SESSION['otp'])) //Accept Address
								{

					            if(isset($_SESSION['mobileErr'])){
					            	echo '<p style="color: red;">'.$_SESSION['mobileErr'].'</p>';
					            	unset($_SESSION['mobileErr']);
					            }

								echo'
								<form class="contact-form row" name="contact-form" method="post" action="validate.php">
					            <div class="form-group col-md-6">
					                <input type="text" name="name" class="form-control" required="required"';if(!isset($_SESSION['name'])){echo'placeholder="Name"';}else{echo'value="'.$_SESSION['name'].'"';}echo' >
					            </div>
					            <div class="form-group col-md-6">
					                <input type="email" name="email" class="form-control" required="required" ';if(!isset($_SESSION['email'])){echo'placeholder="Email"';}else{echo'value="'.$_SESSION['email'].'"';}echo'>
					            </div>
					            <div class="form-group col-md-12">
					                <input type="text" name="mobile" class="form-control" required="required" ';if(!isset($_SESSION['mobile'])){echo'placeholder="Mobile"';}else{echo'value="'.$_SESSION['mobile'].'"'; unset($_SESSION['mobile']);}echo'>
					            </div>                       
					            <div class="form-group col-md-12">
					                <input type="text" name="address" class="form-control" required="required" ';if(!isset($_SESSION['address'])){echo'placeholder="Room No., Hostel"';}else{echo'value="'.$_SESSION['address'].'"';}echo'>
					            </div>					            
					            <div class="form-group col-md-12">
					            	<label><input type="checkbox" name="terms" required="required" value="1"> I agree to Terms & Conditions.</label>
					                <input type="submit" name="submit" class="btn btn-primary pull-right" value="Proceed">
					            	<div class="g-recaptcha" data-sitekey="6LcmqyMTAAAAAFdCc2fp2d-sZD-G_1xYSTuLvI4t"></div>
					            </div>
					            </form>';
					        }
					      	else
					      		//Accept OTP
					      		{echo'
					      		<div class="col-sm-6">
					      		<p><strong>'.$_SESSION['name'].'</strong></br>
					      		'.$_SESSION['address'].'</p>
					      		</div>
					      		<div class="col-sm-6">
					      		<p><i class="fa fa-envelope" style="padding: 0px 5px 0px 2px;"></i>'.$_SESSION['email'].'</br>
					      		<i class="fa fa-phone" style="padding: 0px 5px 0px 2px;"></i>'.$_SESSION['mobile'].'</p>
					      		</div>

					            <form class="contact-form row" name="otp-form" method="post" action="confirmorder.php">
					            <div class="form-group col-md-9" style="padding-left: 30px;">
					                <input type="text" name="otp" class="form-control" required="required" placeholder="Enter OTP">
					            </div>
					            <div class="form-group col-md-3">
					                <input type="submit" name="submit" class="btn btn-primary pull-left" style="margin-top: 0px;" value="Confirm">
					            </div>
					            </form>';
					            unset($_SESSION['otp']);
					        }
					   	echo'
					</div>				
				</div>
				
			</div>
		</div>
	</section><!--/#do_action-->
	';
}	
	
echo'

    <script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.scrollUp.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>
</html>';
?>