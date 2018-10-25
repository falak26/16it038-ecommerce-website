<div id="bodyright">
	<h3>Add New Products From Here</h3>
	<form method="POST" enctype="multipart/form-data" >
		<table>
			<tr>
				<td>Enter Product name:</td>
				<td><input type="text" name="pro_name"/></td>
			</tr>
			<tr>
				<td>Enter Category name:</td>
				<td><select name="cat_name"><?php include("inc/function.php"); echo viewall_cat();?></select></td>
			</tr>
			<tr>
				<td>Enter SubCategory name:</td>
				<td><select name="sub_cat_name"><?php viewall_sub_cat();?></select></td>
			</tr>
			<tr>
				<td>Select Product Image 1:</td>
				<td><input type="file" name="pro_img1"/></td>
			</tr>
			<tr>
				<td>Enter Product Image 2:</td>
				<td><input type="file" name="pro_img2"/></td>
			</tr>
			<tr>
				<td>Enter Product Image 3:</td>
				<td><input type="file" name="pro_img3"/></td>
			</tr>
			<tr>
				<td>Enter Product Image 4:</td>
				<td><input type="file" name="pro_img4"/></td>
			</tr>
			<tr>
				<td>Enter Feature 1:</td>
				<td><input type="text" name="pro_feature1"/></td>
			</tr>
			<tr>
				<td>Enter Feature 2:</td>
				<td><input type="text" name="pro_feature2"/></td>
			</tr>
			<tr>
				<td>Enter Feature 3:</td>
				<td><input type="text" name="pro_feature3"/></td>
			</tr>
			<tr>
				<td>Enter Feature 4:</td>
				<td><input type="text" name="pro_feature4"/></td>
			</tr>
			<tr>
				<td>Enter Feature 5:</td>
				<td><input type="text" name="pro_feature5"/></td>
			</tr>
			<tr>
				<td>Enter Price:</td>
				<td><input type="text" name="pro_price"/></td>
			</tr>
			<tr>
				<td>Enter Model No:</td>
				<td><input type="text" name="pro_model"/></td>
			</tr>
			<tr>
				<td>Enter Warrenty:</td>
				<td><input type="text" name="pro_warrenty"/></td>
			</tr>
			<tr>
				<td>Enter Keyword:</td>
				<td><input type="text" name="pro_keyword"/></td>
			</tr>
			</table>
		<center><button name="add_product">Add Product</button></center>
	</form>
</div>
<?php
include add_pro();
?>