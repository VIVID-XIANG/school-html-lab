<?php include(....); ?>

<html>
<head></head>


<script type="text/javascript">

function confirmation()
{
	$
}

</script>


<body>


		<h1>List of Products</h1>

		<table border="1" width="650px">
			<tr>
				<th>Product Code</th>
				<th>Product Name</th>
				<th>Product Quantity</th>				
				<th colspan="3">Action</th>
			</tr>

			<?php
			
			$result = mysqli_query($connect, "SELECT ALL produc WHERE product_isDelete=0");	

	         while($row = mysqli_fetch_assoc($result))
				{
				
				?>			

				<tr>
					<td><?php echo $row ["product_code"]?></td>
					<td><?php echo $row ["product_name"]?></td>
					<td><?php echo $row ["product_size"]?></td>
					<td><a href="purchase.php?code=<?php echo $row ["product_code"]?>">Buy Now</a></td>
					<td><a href="edit.php?code=<?php echo $row ["product_code"]?>">Edit</a></td>
					<td><a href="productlist.php?code=<?php echo $row ['product_code']?>" onclick="return confirmation();">Delete</a></td>
				</tr>
				<?php
				
				}		
			
			?>

			
			
			
		</table>


	

</body>
</html>
<?php
//remove product from product list
if (isset($_GET[$_GET["code"]])) 
{
	$prodcode=$_GET["code"];
	//update product table and set product_isDelete to 1
	mysqli_query("UPDATE product SET product_isDelete=1 WHERE product_code='$prodcode'");
	header("location:productlist.");
}

?>