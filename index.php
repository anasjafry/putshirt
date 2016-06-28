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
    <title>PuTshirt Store</title>
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
								<li class="active"><a href="index.html"><i class="fa fa-shopping-bag"></i> Shop Now</a></li>
								<li><a href="cart.php"><i class="fa fa-shopping-cart"></i> Cart';if(isset($_SESSION['cart'])){echo'<i class="circlebadge">'.sizeof($_SESSION['cart']).'</i>';}echo'</a></li>
								<li><a href="track.php"><i class="fa fa-binoculars"></i> Track Order</a></li>
								<li><a href="about.php"><i class="fa fa-heart"></i> About Us</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->
	</header><!--/header-->
	
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
						<h2>Category</h2>
						<div class="panel-group category-products" id="accordian"><!--category-productsr-->
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a data-toggle="collapse" data-parent="#accordian" href="#sportswear">
											<span class="badge pull-right"><i class="fa fa-plus"></i></span>
											T-Shirts
										</a>
									</h4>
								</div>
								
								
								<div id="sportswear" class="panel-collapse collapse">
									<div class="panel-body">
										<ul>';
											$link = mysqli_connect("localhost", "root", "", "putshirt");
											$query = "SELECT itemName FROM items WHERE itemType='TSHRT'";
											$obj = $link->query($query);

											while($row = $obj->fetch_assoc()) {
											echo'
											<li><a href="#">'.$row['itemName']. '</a></li>';}
										echo'
										</ul>
									</div>
								</div>
							
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a data-toggle="collapse" data-parent="#accordian" href="#mens">
											<span class="badge pull-right"><i class="fa fa-plus"></i></span>
											Hoodies
										</a>
									</h4>
								</div>
								<div id="mens" class="panel-collapse collapse">
									<div class="panel-body">
										<ul>
											<li><a href="#">Fendi</a></li>
											<li><a href="#">Guess</a></li>
											<li><a href="#">Valentino</a></li>
											<li><a href="#">Dior</a></li>
											<li><a href="#">Versace</a></li>
											<li><a href="#">Armani</a></li>
											<li><a href="#">Prada</a></li>
											<li><a href="#">Dolce and Gabbana</a></li>
											<li><a href="#">Chanel</a></li>
											<li><a href="#">Gucci</a></li>
										</ul>
									</div>
								</div>
							</div>
							
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a data-toggle="collapse" data-parent="#accordian" href="#womens">
											<span class="badge pull-right"><i class="fa fa-plus"></i></span>
											Accessories
										</a>
									</h4>
								</div>
								<div id="womens" class="panel-collapse collapse">
									<div class="panel-body">
										<ul>';
											$link = mysqli_connect("localhost", "root", "", "putshirt");
											$query = "SELECT itemName FROM items WHERE itemType='ACCES'";
											$obj = $link->query($query);

											while($row = $obj->fetch_assoc()) {
											echo'
											<li><a href="#">'.$row['itemName']. '</a></li>';}
										echo'
										</ul>
									</div>
								</div>
							</div>
						</div><!--/category-products-->
					
					</div>
				</div>
				
				<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Featured T Shirts</h2>';
						

								$link = mysqli_connect("localhost", "root", "", "putshirt");
								$query = "SELECT itemName, itemId, itemBrief, itemPrice FROM items WHERE itemType='TSHRT'";
								$obj = $link->query($query);

								while($row = $obj->fetch_assoc()) {
        							//echo "id: " . $row["itemName"]. " - Name: " . $row["itemBrief"]. "<br>";
        							echo'
        						<div class="col-sm-4">
									<div class="product-image-wrapper">
										<div class="single-products">
												<div class="productinfo text-center">
													<img src="images/items/'.$row['itemId'].'.jpg" alt="" />
													<h2><i class="fa fa-inr"></i>'.$row['itemPrice'].'</h2>
													<p>'.$row['itemName'].'</p>
													<a href="product.php?itemid='.$row['itemId'].'" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
												</div>
												<div class="product-overlay">
													<div class="overlay-content">
														<h2><i class="fa fa-inr"></i>'.$row['itemPrice'].'</h2>
														<p>'.$row['itemBrief'].'</p>
														<a href="product.php?itemid='.$row['itemId'].'" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
													</div>
												</div>
										</div>
									</div>
								</div>
        							';
    							}

								?>
						
					</div><!--features_items-->
					
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Accessories</h2>
						<?php

								$link = mysqli_connect("localhost", "root", "", "putshirt");
								$query = "SELECT itemName, itemBrief, itemPrice FROM items WHERE itemType='ACCES'";
								$obj = $link->query($query);

								while($row = $obj->fetch_assoc()) {
        							//echo "id: " . $row["itemName"]. " - Name: " . $row["itemBrief"]. "<br>";
        							echo'
        						<div class="col-sm-4">
									<div class="product-image-wrapper">
										<div class="single-products">
												<div class="productinfo text-center">
													<img src="images/home/product1.jpg" alt="" />
													<h2><i class="fa fa-inr"></i>'.$row['itemPrice'].'</h2>
													<p>'.$row['itemName'].'</p>
													<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
												</div>
												<div class="product-overlay">
													<div class="overlay-content">
														<h2><i class="fa fa-inr"></i>'.$row['itemPrice'].'</h2>
														<p>'.$row['itemBrief'].'</p>
														<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
													</div>
												</div>
										</div>
									</div>
								</div>
        							';
    							}

								?>
						
					</div><!--features_items-->
				</div>
			</div>
		</div>
	</section>
	  
    <script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/price-range.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>
</html>
?>