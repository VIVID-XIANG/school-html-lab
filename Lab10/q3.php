<!DOCTYPE html>
<html>
<head><title>Lab 10</title></head>
<body>

<form name="frm" action="" method="post">

<p>Brand : 
<select name = "tbrand" required>
	<option value = "Nike">Nike (RM 30.00)</option>
	<option value = "Adidas">Adidas (RM 25.00)</option>
</select>
<p>Size : 	<input type="radio" name="tsize" value = "Small" required>Small (Extra RM 5.00)
            <input type="radio" name="tsize" value = "Large">Large (Extra RM 10.00)
            <input type="radio" name="tsize" value = "Extra Large">Extra Large (Extra RM 15.00)

<p><input type="submit" name="sendbtn" value="Calculate"></p>


<?php

if (isset($_POST["sendbtn"]))
{
    $brand=$_POST["tbrand"];
    $size=$_POST["tsize"];

$price=get_price($brand);
$sizeprice=get_extra($size);

display($price,$sizeprice,$size,$brand);
}

function get_price($brand)
{ $price=0;
    switch($brand){

        case 'Nike':
            $price=30;
            break;
         case 'Adidas':
                $price=25;
                break;
    }
    return $price;

}

function get_extra($size)
{
    if($size=='Extra Large'){
        $sizeprice=15;
    }else  if($size=='Large'){
        $sizeprice=10;
    }else  if($size=='Small'){
        $sizeprice=5;
    }
    return $sizeprice;
}

function display($price,$sizeprice,$size,$brand)
{$totalprice=0;
	$totalprice=$price+$sizeprice;
	echo "BRAND:$brand<br>PRICE:$ $price<br>SIZE:$size<br>BILL:$ $totalprice";
}

?>



</form>
</body>
</html>
