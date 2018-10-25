<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Product details</title>
	<link rel="stylesheet" type="text/css" href="css/style_pro_detail.css">
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
		include("inc/function.php");
		echo search();
		
		

	?>
</body>
</html>