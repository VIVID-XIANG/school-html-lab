<!DOCTYPE html>
<html>

<head><title>Lab 10</title></head>

<body>

<form name="addfrm" method="post" action="">

<p>Enter a number: <input type="text" name="num"></p>
<p>
    <input type="submit" name="addbtn" value="Add All Numbers">
    <input type="submit" name="mulbtn" value="Multiply All Numbers">
</p>

</form>

<?php
// 检查请求方法是否为 POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // 检查输入的数字是否有效
    if (isset($_POST["num"]) && is_numeric($_POST["num"])) {
        $num = intval($_POST["num"]);
        
        // 检查输入的数字是否为正数
        if ($num > 0) {
            // 如果按下的是加法按钮
            if (isset($_POST["addbtn"])) {
                $total = 0;
                // 计算 1 到输入数字的总和
                for ($x = 1; $x <= $num; $x++) {
                    $total += $x;
                }
                echo "The total of all numbers is $total";
            // 如果按下的是乘法按钮
            } else if (isset($_POST["mulbtn"])) {
                $total = 1;
                // 计算 1 到输入数字的乘积
                for ($x = 1; $x <= $num; $x++) {
                    $total *= $x;
                }
                echo "The total of all numbers is $total";
            }
        } else {
            // 输入的数字不是正数时显示错误信息
            echo "Please enter a positive number.";
        }
    } else {
        // 输入的数字无效时显示错误信息
        echo "Please enter a valid number.";
    }
}
?>

</body>
</html>
