<?php include("dataconnection.php"); ?>

<html>
<head><title>Movie List</title>
<link href="design.css" type="text/css" rel="stylesheet" />




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
				<th colspan="2">Action</th>
			</tr>
			<!--can copy paste the code from moview_list(view_details).php and add on edit hyperlink-->
			
		<?php 
		$result=mysqli_query($connect,"SELECT * FROM movie ");
		$count=mysqli_num_rows($result);
		
		while($row=mysqli_fetch_assoc($result))
		{
		?>
			<tr>					<!--sql column name-->
				<td><?php echo $row["movie_id"]?></td>
				<td><?php echo $row["movie_title"]?></td>
				<td><?php echo $row["movie_ticket_price"]?></td>
				<td><a href="movie_detail.php?id=<?php  echo $row['movie_id']?>">MORE details</a></td>
										<!--?(thename)-->
				<td><a href="movie_edit.php?id=<?php  echo $row['movie_id']?>">edit</a></td>
				
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

