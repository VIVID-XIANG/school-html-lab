<!DOCTYPE html>
<html>

<head><title>Lab 10</title>
</head>

<body>

<h3><u>ASTRO BILL STATEMENT</u></h3>

	<form name="subscribefrm" method="post" action="" >
	
		<p>Additional Channels : 
			<br><input type="checkbox" name="channel[]" value="Sports">Sports
			<br><input type="checkbox" name="channel[]" value="Movie">Movie
			<br><input type="checkbox" name="channel[]" value="Kids">Kids 
		</p>
		
		<p>
			Bill Type:
			<input type="radio" name="billtype" value="Email" /> Email
			<input type="radio" name="billtype" value="Post" /> Post
		</p>
	
		<p>	<input type="submit" name="billbtn" value="Send" ></p>
	
	</form>

<?php
if(isset($_POST['billbtn'])){

$billtype=isset($_POST["billtype"]) ? $_POST["billtype"] : '';
$channel=isset($_POST["channel"]) ?$_POST["channel"]:[];//number
$totalprice=0;
if($billtype=='Post'){
	$extraprice=3;
}else{
	$extraprice=0;
}
$channelprice=[];
for($i=0;$i<count($channel);$i++){
	
	
	switch($channel[$i]){
		case 'Sports':
			$channelprice[$i]=25;
			break;
			case 'Movie':
				$channelprice[$i]=40;
				break;
				case 'Kids':
					$channelprice[$i]=16;
					break;
	}
	$totalprice+=$channelprice[$i];
}
$sstprice=($extraprice+$totalprice)*(0.06);
$bill=$extraprice+$totalprice+$sstprice;

echo "YOUR SUBSCRIPTION:<br>";
for($i=0;$i<count($channel);$i++){

echo $channel[$i] ."(RM".number_format($channelprice[$i],2)."<br>";
}

echo "<br>BILL COST:RM".number_format($extraprice,2);
echo "<br>SST:RM".number_format($totalprice,2);
echo "<br>SST:RM".number_format($sstprice,2);
echo "<br>BILL:RM ". number_format($bill,2);


}



?>







</body>
</html>