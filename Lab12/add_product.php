<?php include("dataconnection.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add New Product Detail</title>
</head>
<body>

<h1>Add New Product Detail</h1>

<form name="addnewfrm" method="post" action="">

    <p>Code: <input type="text" name="prod_code"></p>
    <p>Chocolate Name: <input type="text" name="prod_name"></p>
    <p>Chocolate Size: 
        <select name="prod_size">
            <option value="small">small</option>
            <option value="big">big</option>
        </select>
    </p>
    <p>Price: <input type="text" name="prod_price"></p>
    <p>Stock: <input type="text" name="prod_stock"></p>

    <p><input type="submit" name="savebtn" value="Save Product"></p>

</form>

<input type="button" value="View" onclick="location='productlist.php'">
<input type="button" value="View Order" onclick="location='orderlist.php'">

</body>
</html>

<?php

if (isset($_POST["savebtn"])) {
    $prodcode = $_POST["prod_code"];
    $prodname = $_POST["prod_name"];
    $prodprice = $_POST["prod_price"];
    $prodstock = $_POST["prod_stock"];
    $prodsize = $_POST["prod_size"];
    
    $result = mysqli_query($connect, "SELECT * FROM product WHERE product_code = '$prodcode'");
    $count = mysqli_num_rows($result);
    
    if ($count != 0) {
        echo '<script>alert("The product code is already in use. Please change.");</script>';
    } else {
        // Use prepared statement to prevent SQL injection
        $stmt = $connect->prepare("INSERT INTO product (product_code, product_name, product_size, product_price, product_stock) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $prodcode, $prodname, $prodsize, $prodprice, $prodstock);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            echo '<script>alert("Saved successfully");</script>';
        } else {
            echo '<script>alert("Failed to save. Please try again.");</script>';
        }
        
        $stmt->close();
    }
}

?>

