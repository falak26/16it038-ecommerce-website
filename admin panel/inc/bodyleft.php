<div id="bodyleft">
	<h3>content management</h3>
	<ul>
		<li><a href="#">Home</a></li>
		<li><a href="index.php?viewall_cat">view all categories</a></li>
		<li><a href="index.php?viewall_sub_cat">view all sub categories </a></li>
		<li><a href="index.php?add_products">Add New products</a></li>
		<li><a href="index.php?viewall_products">view all products</a></li>
	</ul>

</div><!--bodyleft-->
<?php
	if(isset($_GET['viewall_cat'])){
		include("cat.php");
	}
	if(isset($_GET['viewall_sub_cat']))
	{
		include('sub_cat.php');
	}
	if(isset($_GET['add_products']))
	{
		include('add_products.php');
	}
	if(isset($_GET['viewall_products']))
	{
		include('viewall_products.php');
	}
?>