<?php
	function add_cat(){
		error_reporting(0);
	include("inc/db.php");
	
	if(isset($_POST['add_cat']))
	{	
		$cat_name1=$_POST['cat_name'];
		
		$add_cat=$con->prepare("INSERT into main_cat (cat_name) VALUES ('$cat_name1')");
		
		if($add_cat->execute())
		{	
			echo "<script>alert('category added successfully');</script>";
			echo"<script>window.open('index.php?viewall_cat','_self')</script>";
		}
		else{

			echo "<script>alert('error adding category ');</script>";
		
		} 
	}


	}

function add_sub_cat(){
	error_reporting(0);
	include("inc/db.php");
	
	if(isset($_POST['add_sub_cat']))
	{	

		$cat_id=$_POST['main_cat'];
		$sub_cat_name=$_POST['sub_cat_name'];
		
		$add_sub_cat=$con->prepare("INSERT into sub_cat (sub_cat_name,cat_id) VALUES ('$sub_cat_name','$cat_id')");
		
		if($add_sub_cat->execute())
		{
			echo "<script>alert('Subcategory added successfully');</script>";
			echo"<script>window.open('index.php?viewall_sub_cat','_self')</script>";
		}
		
		else{

			echo "<script>alert('error adding Subcategory ');</script>";
		
		} 
	}

}

function viewall_cat(){
	include("inc/db.php");
						$fetch_cat=$con->prepare("SELECT * FROM main_cat");
						$fetch_cat->setFetchMode("PDO:: FETCH_ASSOC");
						$fetch_cat->execute();
						
						while($row=$fetch_cat->fetch()):
							echo "<option value='".$row['cat_id']."'>".$row['cat_name']."</option>";
						endwhile;
}
function viewall_products(){
	error_reporting(0);
	include("inc/db.php");
	$fetch_pro=$con->prepare("SELECT * FROM products");
	$fetch_pro->setFetchMode("PDO:: FETCH_ASSOC");
	$fetch_pro->execute();
	$i=1;
	while ($row=$fetch_pro->fetch()):
		echo"<tr>
		<td>".$i++."</td>
			<td style='min-width:200px'>".$row['pro_name']." </td>
			<td style='min-width:200px'><img src='../imgs/pro_img/".$row['pro_img1']."'/>
			<img src='../imgs/pro_img/".$row['pro_img2']."'/>

			<img src='../imgs/pro_img/".$row['pro_img3']."'/>
			<img src='../imgs/pro_img/".$row['pro_img4']."'/>
			</td>
			<td><a href='index.php?edit_pro=".$row['pro_id']."'>Edit</a></td>
			<td><a href='delete_cat.php?delete_pro=".$row['pro_id']."'>Delete</a></td>
			<td>".$row['pro_feature1']."</td>
			<td>".$row['pro_feature2']."</td>
			<td>".$row['pro_feature3']."</td>
			<td>".$row['pro_feature4']."</td>
			<td>".$row['pro_feature5']."</td>
			<td>".$row['pro_price']."</td>
			<td>".$row['pro_model']."</td>
			<td>".$row['pro_warrenty']."</td>
			<td>".$row['pro_keyword']."</td>
			<td>".$row['pro_added_date']."</td>
			</tr>";
	endwhile;
		
}
function viewall_category(){
	error_reporting(0);
	include("inc/db.php");
	$fetch_cat=$con->prepare("SELECT * FROM main_cat ORDER BY cat_name");
						$fetch_cat->setFetchMode(PDO:: FETCH_ASSOC);
						$fetch_cat->execute();
						$i=1;
						while($row=$fetch_cat->fetch()):
							echo "
							<tr>
							<td>".$i++."</td>
							<td>".$row['cat_name']."</td>
							<td><a href='index.php?edit_cat=".$row['cat_id']."'>Edit</a></td>
							<td><a href='delete_cat.php?delete_cat=".$row['cat_id']."'>Delete</a></td>
							</tr>";

						endwhile;

}
function viewall_sub_category(){
	error_reporting(0);
	include("inc/db.php");
	$fetch_cat=$con->prepare("SELECT * FROM sub_cat ORDER BY sub_cat_name");
						$fetch_cat->setFetchMode("PDO:: FETCH_ASSOC");
						$fetch_cat->execute();
						$i=1;
						while($row=$fetch_cat->fetch()):
							echo "
							<tr>
							<td>".$i++."</td>
							<td>".$row['sub_cat_name']."</td>
							<td><a href='index.php?edit_sub_cat=".$row['sub_cat_id']."'>Edit</a></td>
							<td><a href='delete_cat.php?delete_sub_cat=".$row['sub_cat_id']."'>Delete</a></td>
							</tr>";

						endwhile;

}



function viewall_sub_cat(){
	include("inc/db.php");
						$fetch_sub_cat=$con->prepare("SELECT * FROM sub_cat");
						$fetch_sub_cat->setFetchMode("PDO:: FETCH_ASSOC");
						$fetch_sub_cat->execute();
						
						while($row=$fetch_sub_cat->fetch()):
							echo "<option value='".$row['cat_id']."'>".$row['sub_cat_name']."</option>";
						endwhile;
}

function add_pro(){
	error_reporting(0);
	include("inc/db.php");
	
	if(isset($_POST['add_product']))
	{	
		$pro_name=$_POST['pro_name'];
		$cat_id=$_POST['cat_name'];
		$sub_cat_id=$_POST['sub_cat_name'];

		$pro_img1=$_FILES['pro_img1']['name'];
		$pro_img1_tmp=$_FILES['pro_img1']['tmp_name'];

		$pro_img2=$_FILES['pro_img2']['name'];
		$pro_img2_tmp=$_FILES['pro_img2']['tmp_name'];

		$pro_img3=$_FILES['pro_img3']['name'];
		$pro_img3_tmp=$_FILES['pro_img3']['tmp_name'];

		$pro_img4=$_FILES['pro_img4']['name'];
		$pro_img4_tmp=$_FILES['pro_img4']['tmp_name'];
 	
		move_uploaded_file($pro_img1_tmp,"../imgs/pro_img/$pro_img1");
		move_uploaded_file($pro_img2_tmp,"../imgs/pro_img/$pro_img2");

		move_uploaded_file($pro_img3_tmp,"../imgs/pro_img/$pro_img3");

		move_uploaded_file($pro_img4_tmp,"../imgs/pro_img/$pro_img4");

		$pro_feature1=$_POST['pro_feature1'];
		$pro_feature2=$_POST['pro_feature2'];
		$pro_feature3=$_POST['pro_feature3'];
		$pro_feature4=$_POST['pro_feature4'];
		$pro_feature5=$_POST['pro_feature5'];

		$pro_price=$_POST['pro_price'];
		$pro_model=$_POST['pro_model'];
		$pro_warrenty=$_POST['pro_warrenty'];
		$pro_keyword=$_POST['pro_keyword'];
		$add_cat=$con->prepare("INSERT into products (pro_name,cat_id,sub_cat_id,pro_img1,pro_img2,pro_img3,pro_img4,pro_feature1,pro_feature2,pro_feature3,pro_feature4,pro_feature5,pro_price,pro_model,pro_warrenty,pro_keyword,pro_added_date) VALUES ('$pro_name','$cat_id','$sub_cat_id','$pro_img1','$pro_img2','$pro_img3','$pro_img4','$pro_feature1','$pro_feature2','$pro_feature3','$pro_feature4','$pro_feature5','$pro_price','$pro_model','$pro_warrenty','$pro_keyword',NOW())");
		
		if($add_cat->execute())
		{	
			
			echo"<script>alert('products added successfully');</script>";
		}
		else{

		echo"<script>alert('error adding products ');</script>";
	
		} 
	}


}


function edit_cat(){
	error_reporting(0);
	include("inc/db.php");
	if(isset($_GET['edit_cat'])){
		$cat_id=$_GET['edit_cat'];
		$fetch_cat_name=$con->prepare("SELECT * FROM main_cat where cat_id='$cat_id'");
		$fetch_cat_name->setFetchMode('PDO:: FETCH_ASSOC');
		$fetch_cat_name->execute();
		$row=$fetch_cat_name->fetch();

echo "<form method='POST'>
		<table>
			<tr>
				<td>Upadate category name:</td>
				<td><input type='text' name='up_cat_name' value='".$row['cat_name']."'/></td>
			</tr>
		</table>
		<center><button name='update_cat'>Update category</button></center>
	</form>";
	if(isset($_POST['update_cat'])){

		$up_cat_name=$_POST['up_cat_name'];
		$update_cat=$con->prepare("UPDATE main_cat SET cat_name='$up_cat_name' WHERE cat_id='$cat_id'");

		if($update_cat->execute()){
			echo "<script>alert('category updated successfully');</script>";
		echo"<script>window.open('index.php?viewall_cat','_self');</script>";
		}
}

	}	
}

function edit_sub_cat(){
	error_reporting(0);
	include("inc/db.php");
	if(isset($_GET['edit_sub_cat'])){
	$sub_cat_id=$_GET['edit_sub_cat'];
	$fetch_sub_cat=$con->prepare("SELECT * from sub_cat where sub_cat_id='$sub_cat_id'");
	$fetch_sub_cat->setFetchMode('PDO:: FETCH_ASSOC');
	$fetch_sub_cat->execute();
	$row=$fetch_sub_cat->fetch();
	$cat_id=$row['cat_id'];
	
	$fetch_cat=$con->prepare("SELECT * from main_cat where cat_id='$cat_id'");
	$fetch_cat->setFetchMode('PDO:: FETCH_ASSOC');
	$fetch_cat->execute();
	$row_cat=$fetch_cat->fetch();
	echo "<form method='POST'>
		<table>
			<tr>
				<td>Select Main Category Name:</td>
				<td><select name='main_cat'>
				<option value='".$row_cat['cat_id']."'>".$row_cat['cat_name']."</option>";
				echo viewall_cat();
				echo"</select></td>
				</tr>
				<tr>
				<td>Update Subcategory name:</td>
				<td><input type='text' name='up_sub_cat' value='".$row['sub_cat_name']."'/></td>
			</tr>
		</table>
		<center><button name='update_sub_cat'>Update category</button></center>
	</form>";

	if(isset($_POST['update_sub_cat'])){
		$cat_name=$_POST['main_cat'];
		$sub_cat_name=$_POST['up_sub_cat'];

		$update_cat=$con->prepare("UPDATE sub_cat SET sub_cat_name='$sub_cat_name',cat_id='$cat_name' where sub_cat_id='$sub_cat_id'");

		if($update_cat->execute()){
			echo "<script>alert('Subcategory updated successfully');</script>";
		echo"<script>window.open('index.php?viewall_sub_cat','_self');</script>";
		}

	}

}

}
function edit_pro(){
	error_reporting(0);
	include("inc/db.php");
	if(isset($_GET['edit_pro'])){
		$pro_id=$_GET['edit_pro'];
		$fetch_pro=$con->prepare("SELECT * from products WHERE pro_id='$pro_id'");
		$fetch_pro->setFetchMode('PDO:: FETCH_ASSOC');
		$fetch_pro->execute();
		$row=$fetch_pro->fetch();
		
		
		$cat_id=$row['cat_id'];
		$fetch_cat=$con->prepare("SELECT * from main_cat WHERE cat_id='$cat_id'");
		$fetch_cat->setFetchMode('PDO:: FETCH_ASSOC');
		$fetch_cat->execute();
		$row_cat=$fetch_cat->fetch();
		$cat_name=$row_cat['cat_name'];


		$sub_cat_id=$row['sub_cat_id'];
		$fetch_sub_cat=$con->prepare("SELECT * from sub_cat WHERE sub_cat_id='$sub_cat_id'");
		$fetch_sub_cat->setFetchMode('PDO:: FETCH_ASSOC');
		$fetch_sub_cat->execute();
		$row_sub_cat=$fetch_sub_cat->fetch();
		$sub_cat_name=$row_sub_cat['sub_cat_name'];
				echo "<form method='POST' enctype='multipart/form-data' >
					<table>
					<tr>
						<td>Update Product name:</td>
						<td><input type='text' name='pro_name' value='".$row['pro_name']."'/></td>
					</tr>
					<tr>
						<td>Update Category name:</td>
						<td><select name='cat_name'>
						<option value='".$row['cat_id']."'>".$cat_name."</option>
						"; echo viewall_cat(); echo"</select></td>
					</tr>
					<tr>
						<td>Update SubCategory name:</td>
						<td><select name='sub_cat_name'>
						<option value='".$row['sub_cat_id']."'>".$sub_cat_name."</option>
						"; echo viewall_sub_cat(); echo"</select></td>
					</tr>
					<tr>
						<td>Update Product Image 1:</td>
						<td><input type='file' name='pro_img1' />
						
						<img src='../imgs/pro_img/".$row['pro_img1']."' style='width:60px; height=60px' />
						</td>
					</tr>
					<tr>
						<td>Update Product Image 2:</td>
						<td><input type='file' name='pro_img2' />
						<img src='../imgs/pro_img/".$row['pro_img2']."' style='width:60px; height=60px'/>
						</td>
					</tr>
					<tr>
						<td>Update Product Image 3:</td>
						<td><input type='file' name='pro_img3'/>
						<img src='../imgs/pro_img/".$row['pro_img3']."' style='width:60px; height=60px'/>
						
						</td>
					</tr>
					<tr>
						<td>Update Product Image 4:</td>
						<td><input type='file' name='pro_img4'/>
							<img src='../imgs/pro_img/".$row['pro_img4']."' style='width:60px; height=60px'/>
						
						</td>
					</tr>
					<tr>
						<td>Update Feature 1:</td>
						<td><input type='text' name='pro_feature1' value='".$row['pro_feature1']."'/></td>
					</tr>
					<tr>
						<td>Update Feature 2:</td>
						<td><input type='text' name='pro_feature2' value='".$row['pro_feature2']."'/></td>
					</tr>
					<tr>
						<td>Update Feature 3:</td>
						<td><input type='text' name='pro_feature3' value='".$row['pro_feature3']."'/></td>
					</tr>
					<tr>
						<td>Update Feature 4:</td>
						<td><input type='text' name='pro_feature4' value='".$row['pro_feature4']."'/></td>
					</tr>
					<tr>
						<td>Update Feature 5:</td>
						<td><input type='text' name='pro_feature5' value='".$row['pro_feature5']."'/></td>
					</tr>
					<tr>
						<td>Update Price:</td>
						<td><input type='text' name='pro_price' value='".$row['pro_price']."'/></td>
					</tr>
					<tr>
						<td>Update Model No:</td>
						<td><input type='text' name='pro_model' value='".$row['pro_model']."'/></td>
					</tr>
					<tr>
						<td>Update Warrenty:</td>
						<td><input type='text' name='pro_warrenty' value='".$row['pro_warrenty']."'/></td>
					</tr>
					<tr>
						<td>Update Keyword:</td>
						<td><input type='text' name='pro_keyword' value='".$row['pro_keyword']."'/></td>
					</tr>
					</table>
				<center><button name='up_product'>Update Product</button></center>
			</form>";
	if(isset($_POST['up_product'])){
	 	$pro_name=$_POST['pro_name'];
	$cat_id=$_POST['cat_name'];
	 $sub_cat_id=$_POST['sub_cat_name'];

	 $pro_img1=$_FILES['pro_img1']['name'];
	$pro_img1_tmp=$_FILES['pro_img1']['tmp_name'];

	$pro_img2=$_FILES['pro_img2']['name'];
	 $pro_img2_tmp=$_FILES['pro_img2']['tmp_name'];

	 $pro_img3=$_FILES['pro_img3']['name'];
	 $pro_img3_tmp=$_FILES['pro_img3']['tmp_name'];

	 $pro_img4=$_FILES['pro_img4']['name'];
	$pro_img4_tmp=$_FILES['pro_img4']['tmp_name'];
 	
	move_uploaded_file($pro_img1_tmp,"../imgs/pro_img/$pro_img1");
	move_uploaded_file($pro_img2_tmp,"../imgs/pro_img/$pro_img2");

	 move_uploaded_file($pro_img3_tmp,"../imgs/pro_img/$pro_img3");
	move_uploaded_file($pro_img4_tmp,"../imgs/pro_img/$pro_img4");

	 $pro_feature1=$_POST['pro_feature1'];
	 $pro_feature2=$_POST['pro_feature2'];
	 $pro_feature3=$_POST['pro_feature3'];
	 $pro_feature4=$_POST['pro_feature4'];
	 $pro_feature5=$_POST['pro_feature5'];

	 $pro_price=$_POST['pro_price'];
	 $pro_model=$_POST['pro_model'];
	 $pro_warrenty=$_POST['pro_warrenty'];
	 $pro_keyword=$_POST['pro_keyword'];
		

	 $up_pro=$con->prepare("UPDATE products set pro_name='$pro_name' ,cat_id='$cat_id',sub_cat_id='$sub_cat_id',pro_img1='$pro_img1',pro_img2='$pro_img2',pro_img3='$pro_img3',pro_img4='$pro_img4',pro_feature1='$pro_feature1',pro_feature2='$pro_feature2',pro_feature3='$pro_feature3',pro_feature4='$pro_feature4',pro_feature5='$pro_feature5',pro_price='$pro_price',pro_warrenty='$pro_warrenty',pro_keyword='$pro_keyword' WHERE pro_id='$pro_id'");
	 if($up_pro->execute()){ 
	 	echo"<script>alert('product updated successfully');</script>";
	 	echo"<script>window.open('index.php?viewall_products','_self');</script>";
	 }
	}

}
}

function delete_cat(){
	
		include("inc/db.php");
		$delete_cat_id=$_GET['delete_cat'];
		$delete_cat=$con->prepare("DELETE from main_cat WHERE cat_id='$delete_cat_id'");
		if($delete_cat->execute()){
			echo"<script>alert('Category Deleted successfully');</script>";
			echo"<script>window.open('index.php?viewall_cat','_self');</script>";
		}
	
}

function delete_sub_cat(){
	include("inc/db.php");
	$delete_sub_cat_id=$_GET['delete_sub_cat'];
	$delete_sub_cat=$con->prepare("DELETE from sub_cat WHERE sub_cat_id='$delete_sub_cat_id'");
	if($delete_sub_cat->execute()){
		echo"<script>alert('Subcategory Deleted successfully');</script>";
			echo"<script>window.open('index.php?viewall_sub_cat','_self');</script>";
	}

}

function delete_product(){
	include("inc/db.php");
	$delete_product_id=$_GET['delete_pro'];
	$delete_pro=$con->prepare("DELETE from products WHERE pro_id=$delete_product_id");
	if($delete_pro->execute()){
		echo"<script>alert('Product Deleted successfully');</script>";
			echo"<script>window.open('index.php?viewall_products','_self');</script>";
	}

}
?>
