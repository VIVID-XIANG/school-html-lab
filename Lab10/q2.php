<!DOCTYPE html>
<html>

<head>
    <title>Lab 10</title>
</head>

<body>

    <form name="convertfrm" method="get" action="">
        <!-- action is process run php code -->

        <p>Enter the measurement in kilometer : <input type="text" name="kilometer" ></p>
        <p>Choose a unit to convert :
            <input type="radio" name="unit" value="Miles" required> Miles
            <input type="radio" name="unit" value="Yards"> Yards
            <input type="radio" name="unit" value="Inch"> Inch
        </p>
        <p><input type="submit" name="convertbtn" value="Convert Value"></p>

    </form>

    <?php
    // Define conversion rates as constants
    define("MILE_RATE", 0.621371);
    define("YARD_RATE", 1093.61);
    define("INCH_RATE", 39370.1);

    // Check if the form is submitted
    if (isset($_GET["convertbtn"])) {
        $km = $_GET["kilometer"];
        $unit = $_GET["unit"];
        $formula = 0; // Initialize formula variable
        $process = ""; // Initialize process description

        switch ($unit) {
            case "Miles":
                $process = "Process: kilometer to miles";
                $formula = $km * MILE_RATE;
                break;
            case "Yards":
                $process = "Process: kilometer to yards";
                $formula = $km * YARD_RATE;
                break;
            case "Inch":
                $process = "Process: kilometer to inches";
                $formula = $km * INCH_RATE;
                break;
            default:
                $process = "Unknown unit";
                break;
        }
        
    }
    ?>

    <script>
        // Use JavaScript to alert and display the results
        alert("<?php echo $process; ?>");
        document.write("<?php echo "$km km = $formula $unit"; ?>");
    </script>

</body>
</html>
