<?php include("dataconnection.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Product Detail</title>
</head>
<body>
<?php
if (isset($_GET["code"])) {
    $pcode = $_GET["code"];
    $result = mysqli_query($connect, "SELECT * FROM product WHERE product_code='$pcode'");
    $row = mysqli_fetch_assoc($result);
}
?>

<h1>Update Product Detail</h1>

<form name="updatefrm" method="post" action="">

    <p>Code: <input type="text" name="prod_code" value="<?php echo $row['product_code']; ?>" disabled></p>

    <p>Name: <input type="text" name="prod_name" value="<?php echo $row['product_name']; ?>"></p>
    
    <p>Chocolate Size:
        <select name="prod_size">
            <option value="small" <?php if($row['product_size'] == "small") echo "selected"; ?>>small</option>
            <option value="big" <?php if($row['product_size'] == "big") echo "selected"; ?>>big</option>
        </select>
    </p>
    
    <p>Price: <input type="text" name="prod_price" value="<?php echo $row['product_price']; ?>"></p>
    <p>Stock: <input type="text" name="prod_stock" value="<?php echo $row['product_stock']; ?>"></p>

    <p><input type="submit" name="savebtn" value="Update Product"></p>

</form>

</body>
</html>

<?php
if (isset($_POST['savebtn'])) {
    $pname = $_POST["prod_name"];
    $pprice = $_POST["prod_price"];
    $psize = $_POST["prod_size"];
    $pstock = $_POST["prod_stock"];

    // Use prepared statement to prevent SQL injection
    $stmt = $connect->prepare("UPDATE product SET product_name=?, product_price=?, product_size=?, product_stock=? WHERE product_code=?");
    $stmt->bind_param("sssss", $pname, $pprice, $psize, $pstock, $pcode);
    $stmt->execute();
    
    header("location:productlist.php"); //redirect user back to productlist.php
    exit();
}
?>
