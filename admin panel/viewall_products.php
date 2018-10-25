<div class="scroll" id="bodyright">
	<h3>Add New Products From Here</h3>
	<form method="POST" enctype="multipart/form-data" >
	<table>
		<tr>
			<th>Sr No.</th>
			<th>Product Name </th>
			<th>Product Images</th>
			<th>Edit</th>
			<th>Delete</th>
			<th>Feature1</th>
			<th>Feature2</th>
			<th>Feature3</th>
			<th>Feature4</th>
			<th>Feature5</th>
			<th>Price</th>
			<th>Model no.</th>
			<th>Warrenty</th>
			<th>Keyword</th>
			<th>Add Date</th>
			<?php include("inc/function.php");
			echo viewall_products();
			?>
	</table>
		
	</form>
</div>



