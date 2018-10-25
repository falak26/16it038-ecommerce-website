<?php
	
	function u_signup(){
		include("inc/db.php");
		if(isset($_POST['u_signup'])){
			$u_name=$_POST['u_name'];
			$u_email=$_POST['u_email'];
			$u_add=$_POST['u_add'];
			$u_state=$_POST['u_state'];
			$u_pin=$_POST['u_pin'];
			$u_date=$_POST['u_date'];
			$u_phone=$_POST['phone'];

			$u_pass=mt_rand();

			$add_user=$con->prepare("INSERT into users(u_name,u_email,u_pass,u_add,u_pin,u_dob,u_phone,u_state,u_reg_date) VALUES('$u_name','$u_email','$u_pass','$u_add','$u_pin','$u_date','$u_phone','$u_state',NOW())");
			if($add_user->execute()){
				echo"<script>alert('Registration succesfull check your email for password');</script>";
				echo"<script>window.open('index.php','_self');</script>";
			}
			else{
				echo"<script>alert('Registration fail');</script>";
				
			}


		}


	}
	function getIp() {
	    $ip = $_SERVER['REMOTE_ADDR'];
	 
	    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
	        $ip = $_SERVER['HTTP_CLIENT_IP'];
	    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
	        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
	    }
	 
	    return $ip;
	}
	function add_cart(){
		include ("inc/db.php");
		if(isset($_POST['cart_btn'])){
			$pro_id=$_POST['pro_id'];
			$ip=getIp();

			$check_cart=$con->prepare("SELECT * from cart where pro_id='$pro_id' AND ip_add='$ip'");
			$check_cart->execute();
			$row_check=$check_cart->rowCount();
			if($row_check==1){
				echo"<script>alert('This product already added in your cart');</script>";
			}else{$add_cart=$con->prepare("INSERT into cart (pro_id,qty,ip_add) VALUES ('$pro_id','1','$ip') ");
			if($add_cart->execute()){
				echo"<script>window.open('index.php','_self');</script>";
			}
			else{
				echo"<script>alert('Try Again !!!');</script>";}
		}
	}
}
function electronics(){
	error_reporting(0);
	include ("inc/db.php");
	$fetch_cat=$con->prepare("SELECT * from main_cat WHERE cat_id='224'"); 
	$fetch_cat->setFetchMode('PDO:: FETCH_ASSOC');
	$fetch_cat->execute();

	$row_cat=$fetch_cat->fetch();
	$cat_id=$row_cat['cat_id'];
	echo"<h3>".$row_cat['cat_name']."</h3>";

	$fetch_pro=$con->prepare("SELECT * from products WHERE cat_id='$cat_id' LIMIT 0,3");
	$fetch_pro->setFetchMode('PDO:: FETCH_ASSOC');
	$fetch_pro->execute();

	while($row_pro=$fetch_pro->fetch()):
	echo "	
		<li>
		<form method='POST' enctype='multipart/form-data'>
			<a href='pro_detail.php?pro_id=".$row_pro['pro_id']." '>
			<h4>".$row_pro['pro_name']."</h4>
			<img src='../imgs/pro_img/".$row_pro['pro_img1']."'/>

			<center><button id='pro_btn'><a href='pro_detail.php?pro_id=".$row_pro['pro_id']." '>view</a></button>
			
			<input type='hidden' value='".$row_pro['pro_id']."' name='pro_id'/>
			<button id='pro_btn' name='cart_btn'>Cart</button>
			<button id='pro_btn'><a href='#'>Wishlist</a></button>
			</center>
			</a>
			</form>
		</li>";
		endwhile;
}
function fashion(){
	error_reporting(0);
	include ("inc/db.php");
	$fetch_cat=$con->prepare("SELECT * from main_cat WHERE cat_id='74'"); 
	$fetch_cat->setFetchMode('PDO:: FETCH_ASSOC');
	$fetch_cat->execute();

	$row_cat=$fetch_cat->fetch();
	$cat_id=$row_cat['cat_id'];
	echo"<h3>".$row_cat['cat_name']."</h3>";

	$fetch_pro=$con->prepare("SELECT * from products WHERE cat_id='$cat_id'LIMIT 0,3");
	$fetch_pro->setFetchMode('PDO:: FETCH_ASSOC');
	$fetch_pro->execute();

	while($row_pro=$fetch_pro->fetch()):
	echo "	
		<li>
			<a href='pro_detail.php?pro_id=".$row_pro['pro_id']." '>
			<h4>".$row_pro['pro_name']."</h4>
			<img src='../imgs/pro_img/".$row_pro['pro_img1']."'/>

			<center><button id='pro_btn'><a href='pro_detail.php?pro_id=".$row_pro['pro_id']." '>view</a></button>
			<button id='pro_btn'><a href='#'>Cart</a></button>
			<button id='pro_btn'><a href='#'>Wishlist</a></button>
			</center>
			</a>

		</li>";
		endwhile;
}
function bags(){
	error_reporting(0);
	include ("inc/db.php");
	$fetch_cat=$con->prepare("SELECT * from main_cat WHERE cat_id='225'"); 
	$fetch_cat->setFetchMode('PDO:: FETCH_ASSOC');
	$fetch_cat->execute();

	$row_cat=$fetch_cat->fetch();
	$cat_id=$row_cat['cat_id'];
	echo"<h3>".$row_cat['cat_name']."</h3>";

	$fetch_pro=$con->prepare("SELECT * from products WHERE cat_id='$cat_id'LIMIT 0,3");
	$fetch_pro->setFetchMode('PDO:: FETCH_ASSOC');
	$fetch_pro->execute();

	while($row_pro=$fetch_pro->fetch()):
	echo "	
		<li>
			<a href='pro_detail.php?pro_id=".$row_pro['pro_id']." '>
			<h4>".$row_pro['pro_name']."</h4>
			<img src='../imgs/pro_img/".$row_pro['pro_img1']."'/>

			<center><button id='pro_btn'><a href='pro_detail.php?pro_id=".$row_pro['pro_id']." '>view</a></button>
			<button id='pro_btn'><a href='#'>Cart</a></button>
			<button id='pro_btn'><a href='#'>Wishlist</a></button>
			</center>
			</a>

		</li>";
		endwhile;
}
		

function pro_details(){
	error_reporting(0);
	include("inc/db.php");
	if (isset($_GET['pro_id'])) {
		$pro_id=$_GET['pro_id'];
		$pro_fetch=$con->prepare("SELECT * from products WHERE pro_id='$pro_id'");
		$pro_fetch->setFetchMode(PDO:: FETCH_ASSOC);
		$pro_fetch->execute();

		$row_pro=$pro_fetch->fetch();

		$cat_id=$row_pro['cat_id'];

		echo"
			<div id='pro_img'>
			<img src='../imgs/pro_img/".$row_pro['pro_img1']."' />
			<ul>
			<li><img src='../imgs/pro_img/".$row_pro['pro_img1']."' /></li>
			<li><img src='../imgs/pro_img/".$row_pro['pro_img2']."' /></li>
			<li><img src='../imgs/pro_img/".$row_pro['pro_img3']."' /></li>
			<li><img src='../imgs/pro_img/".$row_pro['pro_img4']."' /></li>
			
			</ul>
			</div><br clear='all' />




			<div id='pro_features'>
			<h3>".$row_pro['pro_name']."</h3><hr/>
			<ul>
				<li>".$row_pro['pro_feature1']."</li>
				<li>".$row_pro['pro_feature2']."</li>
				<li>".$row_pro['pro_feature3']."</li>
				<li>".$row_pro['pro_feature4']."</li>
				<li>".$row_pro['pro_feature5']."</li>
			</ul>
			<ul>
			<li> Model no :".$row_pro['pro_model']."</li>
			<li> warrenty :".$row_pro['pro_warrenty']."</li>

			
			</ul><br clear='all' />
			<center><h4>Selling Price:".$row_pro['pro_price']."</h4>
			<form method='POST'>
			<button id='buy_now' name='buy_now'>Buy Now</button>
			<button id='cart' name='cart'>Add to Cart</button>
			</form>
			</center>
			</div><br clear='all' />

			<div id='sim_pro'>
			<h3>More Like This</h3>
			<ul>";
				$sim_pro=$con->prepare("SELECT * FROM products WHERE cat_id='$cat_id' LIMIT 0,5");
				$sim_pro->setFetchMode(PDO:: FETCH_ASSOC);
				$sim_pro->execute();
				while($row=$sim_pro->fetch()):
					echo"<li>
							<a href='pro_detail.php?pro_id=".$row['pro_id']."'>
							<img src='../imgs/pro_img/".$row['pro_img1']."' /> 
							<p>".$row['pro_name']."</p>
							<p> Price: ₹".$row['pro_price']."</p>
							</a>


					</li>";
				endwhile;
			echo"</ul>

			</div>";
	}
}

function search(){
	include("inc/db.php");
	if(isset($_GET['search'])){
	$user_query1=$_GET['user_query'];
	$search=$con->prepare("SELECT * FROM products WHERE pro_keyword LIKE '%$user_query1'");
	$search->setFetchMode(PDO:: FETCH_ASSOC);
	$search-> execute();
	echo"<div id='bodyleft'><ul>";
	while($row=$search->fetch()):
		echo"<li>
			<a href='pro_detail.php?pro_id=".$row['pro_id']." '>
			<h4>".$row['pro_name']."</h4>
			<img src='../imgs/pro_img/".$row['pro_img1']."'/>

			<center>
			<button id='pro_btn'><a href='pro_detail.php?pro_id=".$row['pro_id']." '>view</a></button>
			<button id='pro_btn'><a href='#'>Cart</a></button>
			<button id='pro_btn'><a href='#'>Wishlist</a></button>
			</center>
			</a>

		</li>";
		
	endwhile;
	echo"</ul></div>";
}
}
?>