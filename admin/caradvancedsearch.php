<?php 
session_start();
if (!isset($_SESSION["SESSION_EMAIL"])) {
    header("Location: ../index.php");
}
$host = "localhost";
$username = "root";
$password = "";
$database = "car_rental_system";
$conn = new mysqli($host, $username, $password, $database);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $start = $_POST['startdate'];


    $sqlrented = "
    SELECT c.*
    FROM car as  c 
    where c.PlateId LIKE '%$start%' OR 
    c.CarName LIKE '%$start%' OR 
    c.Overview LIKE '%$start%' OR 
    c.PricePerDay LIKE '%$start%' OR 
    c.Year LIKE '%$start%' OR 
    c.DriverAirbag LIKE '%$start%' OR 
    c.Status LIKE '%$start%'  OR
    c.Color LIKE '%$start%'  OR
    c.OId LIKE '%$start%'  OR
    c.Seating_capacity LIKE '%$start%'  OR
    c.Air_conditioner LIKE '%$start%'   OR 
    c.brandName LIKE '%$start%'    OR
    c.category LIKE '%$start%'
";
//  echo $sqlrented;
$resultrented = $conn->query($sqlrented);
// echo $resultrented. ;
if ($resultrented === false) {
    echo "SIU" ; 
    die("Error executing the query: " . $conn->error);
}



    $conn->close();
}
    ?>


<!DOCTYPE html>
<meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, height=device-height, initial-scale=1, maximum-scale=1, user-scalable=0">
    <title>RentCar</title>
    <link rel="stylesheet" href="css/normalize.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Rubik:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
        <link rel="stylesheet" href="master.css">

</head>
<body>
        <!-- Start Header bar -->
        <div class="header-bar">
        <div class="container">
            <div class="icons">
                <a href="https://www.facebook.com/"><i class="fab fa-facebook"></i></a>
                <a href="https://twitter.com/?lang=en"><i class="fab fa-instagram"></i></a>
            </div>
            <div class="text">
                <div class="phone">
                    <i class="fas fa-phone-square-alt"></i>
                    01234567891
                </div>
                <div class="email">
                    <i class="fas fa-envelope"></i> contact@rentacar.com
                </div>
            </div>
        </div>
    </div>
    <!-- End Header bar -->
    <!-- Start Header -->
    <div class="header" id="header" style="margin-bottom:200px;">
    <div class="container">
        <div class="logo">
            <img src="logo.png" alt="">
        </div>
        <div class="rl-container">
            <nav>
                <ul>
                    <li class="home"><a href="temp.php">HOME</a></li>
                    <li class="about-us"><a href="add.php">ADD NEW CAR</a></li>
                    <li class="login"><a href="addnewoffice.php" class="button">ADD NEW OFFICE</a></li>
                    <li class="dropdown">
                        <a href="#" aria-haspopup="true">Advanced Search</a>
                        <ul class="dropdown-menu" aria-label="submenu">
                            <li><a href="customeradvancesearch.php">By Customer</a></li>
                            <li><a href="caradvancedsearch.php">By Car</a></li>
                            <li><a href="reservationadvancedsearch.php">By Reservation</a></li>


                        </ul>
                    </li>

                    <li class="dropdown">
                    <a href="#" aria-haspopup="true"> Search</a>

                        <ul class="dropdown-menu" aria-label="submenu">
                            <li><a href="reservecar.php">Reservations of car</a></li>
                            <li><a href="daily_payments.php">Daily Payments</a></li>
                            <li><a href="statusofcar.php">Status of cars</a></li>
                            <li><a href="reservecustomer.php">Reservations of customer</a></li>
                            <li><a href="reserveperiod.php">Reservations of period</a></li>
                        </ul>
                    </li>
                    <li class="register"><a href="../logout.php" class="button">LOGOUT</a></li>

                </ul>
            </nav>
        </div>
    </div>
</div>

    <!-- End Header -->

    <div class="caratts">
            <div class="container">
                <form action="" method="post" id="form">
        <div class="brandatts">
                <label for="startdate">Enter Car data</label>
                <input type="text" id="startdate" name="startdate">
                <div class="error"></div>
               
        </div>
   
        <div class="submit">            
                    <button class="submit-btn">Submit</button>
                    </div>

    </form>
</div>
</div>
<div class="output">
    <div class="container">
        <?php
        // Display car information
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($resultrented)) {
            echo '<div class="results">';

            if ($resultrented->num_rows > 0) {
                // Output car information in a box
                while ($row = $resultrented->fetch_assoc()) {
                    echo '<div class="car-info-box">';
                    echo '<h3>Car Information</h3>';
                    echo '<form action="" method="post">';
                    echo '<div class="image-box"> ';
                    echo '<img src="data:image/jpeg;base64,'.base64_encode($row["Image"]).'" ><br>';
                    echo '</div>';
    
    
    
    
                    echo '<div class="results-box"> ';
                    echo '<label for="bd">Brand Name:</label>';
                    echo '<input type="text" id = "bd" name="bd" value="' . $row["brandName"] . '" readonly>';
                    echo '</div>';

                    echo '<div class="results-box"> ';
                    echo '<label for="brand">Car Name:</label>';
                    echo '<input type="text" id = "brand" name="brand" value="' . $row["CarName"] . '" readonly>';
                    echo '</div>';

                    echo '<div class="results-box"> ';
                    echo '<label for="catego">Category:</label>';
                    echo '<input type="text" id = "catego" name="catego" value="' . $row["category"] . '" readonly>';
                    echo '</div>';
                    
                    echo '<div class="results-box"> ';
                    echo '<label for="overview">OverView:</label>' ;
                    echo '<input type="text" id = "overview" name="overview" value="' . $row["Overview"] . '" readonly>';
                    echo '</div>';
    
                    // echo '<input type="text" id="color" name="color" value="' . $row["color"] . '" readonly>';
                    echo '<div class="results-box"> ';
                    echo '<label for="airbag">Airbag:</label>' ;
                    echo '<input type="text" id="airbag" name="airbag" value="' . $row["DriverAirbag"] . '" readonly>';
                    echo '</div>';
    
    
                    echo '<div class="results-box"> ';
                    echo '<label for="plate_id">Plate Id:</label>' ;
                    echo '<input type="text"  id="plate_id" name="plate_id" value="' . $row["PlateId"] . '" readonly>';
                    echo '</div>';
    
                    // echo '<input type="text" id="status" name="status" value="' . $row["status"] . '" readonly>';
                    echo '<div class="results-box"> ';
                    echo '<label for="price_per_day">Price Per Day:</label>' ;
                    echo '<input type="text" id="price_per_day" name="price_per_day" value="' . $row["PricePerDay"] . '" readonly>';
                    echo '</div>';
    
    
                    echo '<div class="results-box"> ';
                    echo '<label for="seatingcapacity">Seating Capacity:</label>' ;
                    echo '<input type="text" id="seatingcapacity" name="seatingcapacity" value="' . $row["Seating_capacity"] . '" readonly>';
                    echo '</div>';
    
                    echo '<div class="results-box"> ';
                    echo '<label for="year">Year:</label>' ;
                    echo '<input type="text" id="year" name="year" value="' . $row["Year"] . '" readonly>';
                    echo '</div>';
    
                    echo '<div class="results-box"> ';
                    echo '<label for="airconditioner">Air Conditioner:</label>' ;
                    echo '<input type="text" id="airconditioner" name="airconditioner" value="' . $row["Air_conditioner"] . '" readonly>';
                    echo '</div>';
                    echo '<div class="results-box"> ';
                    echo '<label for="status">Status:</label>' ;
                    echo '<input type="text" id="status" name="status" value="' . $row["Status"] . '" readonly>';
                    echo '</div>';
                    echo '<div class="results-box"> ';
                    echo '<label for="airconditioner">Office Id:</label>' ;
                    echo '<input type="text" id="oid" name="oid" value="' . $row["OId"] . '" readonly>';
                    echo '</div>';
                    echo '<div class="results-box"> ';
                    echo '<label for="color">Color:</label>' ;
                    echo '<input type="text" id="color" name="color" value="' . $row["Color"] . '" readonly>';
                    echo '</div>';
                    echo '</form>';
                    echo '</div>';
                }
            } else {
                echo '<div class="car-info-box">';
                echo '<p>No cars found matching the criteria.</p>';
                echo '</div>';
            }
            echo '</div>';
        }
        ?>
    </div>
</div>



</body>
<script>
        let id = (id) => document.getElementById(id);
        let classes = (classes) => document.getElementsByClassName(classes);
        let startdate = id("startdate");
        let form = id("form");
        let errorMsg = classes("error");
        let results = classes("results");
        console.log("SIU") ;
        console.log(startdate.value);
        form.addEventListener("submit", (e) => {
            let resultsElement = document.querySelector('.output .results');
    if (resultsElement) {
        resultsElement.innerHTML = "";
    }
 
            let validationPassed2 = true;
            validationPassed2 = validationPassed2 && engine(startdate, 0, "Please Enter any value") ;
            if (!validationPassed2 ) {
                results.innerHTML = "" ;

            e.preventDefault();

        }
        });

        let engine = (id, serial, message) => {
            if (id.value.trim() === "") {
                errorMsg[serial].innerHTML = "";
                errorMsg[serial].innerHTML = message;
                id.style.border = "2px solid red";
                return false;
            } else {
 

                errorMsg[serial].innerHTML = "";
                id.style.border = "2px solid green";
                return true;
            }
        };

    </script>


</html>