

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Web Application</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href='https://fonts.googleapis.com/css?family=Barlow' rel='stylesheet'>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
		$(window).on('scroll', function() {
			if($(window).scrollTop()) {
				$('nav').addClass('black');
			}
			else{
				$('nav').removeClass('black');
			}

		})
	</script>

</head>
<body>
	<?php 
		include("inc/header.php");
		include("inc/navbar.php");
		include("inc/bodyleft.php");
		include("inc/bodyright.php");
		include("inc/footer.php");
		include("inc/function.php");
		echo add_cart();
		echo u_signup();
		// include("inc/section.php");
	?>
	
<!-- <div> -->
<!-- <div id="header">
	<div id="logo">
		<img src="imgs/logo.png"></img>
	</div>

	<div id="link">
		<ul>
			<li><a href="#">Sign Up</a></li>
			<li><a href="#">Login</a></li>
		</ul>
	</div>
<div id="search">
<form method="GET" enctype="multipart/form-data">
	<input type="text" placeholder="search anything...">
	<button class="button button1">Search</button>
	<button class="button button2">Cart</button>
</form>
	</div>
</div>
 -->
 
<!-- <div>
	<nav>

		<div class="logo" style="font-family: 'Srisakdi';">FASHIONIST</div>
		<ul>
			<li><a href="#">Categories</a></li>
			<li><a href="#">Gifts for Men</a></li>
			<li><a href="#">Birthday</a></li>
			<li><a href="#">Gifts for her</a></li>
			<li><a href="#">Flowers</a></li>
			<li><a href="#">Gifts for Kids</a></li>
			<li><a class="active" href="#">Brands</a></li>	
		</ul>
		</nav>
	</div>
	<section class="sec1"></section>
 <!-slider-->
<!-- <div id="bodyleft">
	<div id="slider">
		<h2>Deals of the Day</h2>
	<img src="2"></img>
	</div>
	<h3>Electronic</h3>
	<ul>
		<li>
			<a href="#">
			</a>
		</li>
		<li>
			<a href="#">
			</a>
		</li>
		<li>
			<a href="#">
			</a>
		</li><br clear="all"/>
	</ul>

	<h3>Electronic</h3>
	<ul>
		<li>
			<a href="#">
			</a>
		</li>
		<li>
			<a href="#">
			</a>
		</li>
		<li>
			<a href="#">
			</a>
		</li><br clear="all"/>
	</ul>

</div>

</div>

 --><!-- <div id="bodyright">
	<h3>Greate Deals</h3>
</div> --><!--bodyright-->
<!-- <br clear="all">
<div id="footer">
	<h4>Copyright 2018 &copy; Fashionist </h4>
</div> --><!--fotter-->
 
</body>
</html>
