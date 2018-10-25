<div id="bodyright">
	<h3>View All Categories</h3>
	<form method="POST" enctype="multipart/form-data">
		<table>
			<tr>
				<th>Sr No.</th>
				<th>Category Name</th>
				<th>Edit</th>
				<th>Delete</th>
			</tr>
			
				<?php include("inc/function.php"); echo viewall_category(); ?>
			
		</table>

	</form>
	<h3 id="add_cat">Add New category From Here</h3>
	<form method="POST" >
		<table>
			<tr>
				<td>Enter category name:</td>
				<td><input type="text" name="cat_name"></td>
			</tr>
		</table>
		<center><button name="add_cat">Add category</button></center>
	</form>
</div>
<?php
error_reporting(0);
echo add_cat();

?>