<div id="bodyright">
	<h3>View All Sub Categories</h3>
	<form method="POST" enctype="multipart/form-data">
		<table>
			<tr>
				<th>Sr No.</th>
				<th>Sub Category Name</th>
				<th>Edit</th>
				<th>Delete</th>
			</tr>
			
				<?php include("inc/function.php"); echo viewall_sub_category(); ?>
			
		</table>

	</form>
	<h3 id="add_cat">Add New Sub category From Here</h3>
	<form method="POST" >
		<table>
			<tr>
				<td>Select category name:</td>
				<td>
				<select name="main_cat">
					<?php
						echo viewall_cat();
						?>
				</select>
				</td>
			</tr>
			<tr>
				<td>Enter Sub category name:</td>
				<td><input type="" name="sub_cat_name"/></td>
			</tr>
		</table>
		<center><button name="add_sub_cat">Add Sub category</button></center>
	</form>
</div>
<?php
	error_reporting(0);
	include add_sub_cat();
?> 