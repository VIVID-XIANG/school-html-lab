<?php include("dataconnection.php"); ?>

<html>
<head><title>Movie List</title>
<link href="design.css" type="text/css" rel="stylesheet" />

<script type="text/javascript">

//create a javascript function named confirmation()
function confirmation()
{
	ans=confirm("ARE YOU SURE?");
	return ans;
}
</script>


</head>
<body>

<div id="wrapper">

	<div id="left">
		<?php include("menu.php"); ?>
	</div>
	
	<div id="right">

		<h1>List of Movies</h1>

		<table border="1">
			<tr>
				<th>Movie ID</th>
				<th>Movie Title</th>
				<th>Movie Ticket Price</th>
				<th colspan="3">Action</th>
			</tr>
			<!--copy the code from movie_list(edit) and add on the delete hyperlink-->
<?php	

$result=mysqli_query($connect,"SELECT * FROM movie");
$count=mysqli_num_rows($result);

while($row=mysqli_fetch_assoc($result))
{
?>

<tr>
	<th><?php   echo $row["movie_id"]  ?></th>
	<th><?php   echo $row["movie_title"]  ?></th>
	<th><?php   echo $row["movie_ticket_price"]  ?></th>

	<td><a href="movie_detail.php?id=<?php  echo $row['movie_id']?>">MORE details</a></td>
										<!--?(thename)-->
	<td><a href="movie_edit.php?id=<?php  echo $row['movie_id']?>">edit</a></td>
	<th><a style='color:red' onclick="return confirmation()"; href="movie_list(delete).php?delid=<?php   echo $row['movie_id']  ?>">DELETE</a></th>
							<!--change the ID!!-->
</tr>


<?php
}
?>


		</table>


		<p> Number of records : <?php echo $count; ?></p>

	</div>
	
</div>


</body>
</html>
<?php

if (isset($_GET["delid"])) 
{
	$delid=$_GET["delid"];
	mysqli_query($connect,"DELETE FROM movie WHERE movie_id=$delid ");
	header("Location: movie_list(delete).php"); //refresh the page

}


?>
