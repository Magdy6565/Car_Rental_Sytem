<?php 
session_start();
if (!isset($_SESSION["SESSION_EMAIL"])) {
    header("Location: ../index.php");
}
    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "car_rental_system";
/******************************************************************************* */
$conn= new mysqli($host, $username, $password, $database);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
 $start = $_POST['startdate'];   
 $end = $_POST['enddate'];   
 $sql = "
 SELECT Image,pickup_date, return_date, u.FirstName, u.LastName, u.SSN, u.country, c.CarName, c.PlateId, c.PricePerDay , c.brandName  , c.category
 FROM reservation as r 
 JOIN car as c ON r.PlateId = c.PlateId 
 JOIN users as u ON r.SSN  = u.SSN 
 WHERE   pickup_date BETWEEN '$start' AND '$end'    OR  '$start' BETWEEN pickup_date AND return_date 
 ";
 
 $result = $conn->query($sql);
  if ($result === false) {
     echo "Error: " . $conn->error;
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
                <label for="startdate">Start Date</label>
                <input type="date" id="startdate" name="startdate">
                <div class="error"></div>
                <label for="enddate">End Date</label>
                <input type="date" id="enddate" name="enddate">
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
            // Display the results
            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($result)) {
                echo '<div class="results">';
                // echo($result->num_rows );
                if ($result->num_rows > 0) {
                    // Output the car information in a box
                    while ($row = $result->fetch_assoc()) {

                echo '<div class="car-info-box">';
                echo '<h3>Car Information</h3>';
                echo '<form action="" method="post">';
                echo '<div class="image-box"> ';
                echo '<img src="data:image/jpeg;base64,'.base64_encode($row["Image"]).'" ><br>';
                echo '</div>';
                echo '<div class="results-box"> ';
                echo '<label for="ssn">SSN:</label>' ;
                echo '<input type="text" id = "ssn" name="ssn" value="' . $row["SSN"] . '" readonly>';
                echo '</div>';
                
                echo '<div class="results-box"> ';
                echo '<label for="fname">Firstname:</label>' ;
                echo '<input type="text" id = "fname" name="fname" value="' . $row["FirstName"] . '" readonly>';
                echo '</div>';

                // echo '<input type="text" id="color" name="color" value="' . $row["color"] . '" readonly>';
                echo '<div class="results-box"> ';
                echo '<label for="lname">LastName:</label>' ;
                echo '<input type="text" id="lname" name="lname" value="' . $row["LastName"] . '" readonly>';
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
                echo '<label for="country">Country:</label>' ;
                echo '<input type="text" id="country" name="conutry" value="' . $row["country"] . '" readonly>';
                echo '</div>';

                echo '<div class="results-box"> ';
                echo '<label for="pickupdate">Pickup Date:</label>' ;
                echo '<input type="text" id="pickupdate" name="pickupdate" value="' . $row["pickup_date"] . '" readonly>';
                echo '</div>';

                echo '<div class="results-box"> ';
                echo '<label for="enddate">Return Date:</label>' ;
                echo '<input type="text" id="enddate" name="enddate" value="' . $row["return_date"] . '" readonly>';
                echo '</div>';
   
                echo '<div class="results-box"> ';
                echo '<label for="carname">Brand Name:</label>' ;
                echo '<input type="text" id="carname" name="carname" value="' . $row["brandName"] . '" readonly>';
                echo '</div>';
                echo '<div class="results-box"> ';
                echo '<label for="carname">Category:</label>' ;
                echo '<input type="text" id="carname" name="carname" value="' . $row["category"] . '" readonly>';
                echo '</div>';
                echo '<div class="results-box"> ';
                echo '<label for="carname">Car Name:</label>' ;
                echo '<input type="text" id="carname" name="carname" value="' . $row["CarName"] . '" readonly>';
                echo '</div>';


                echo '</form>';
                echo '</div>';}

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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script>
        let id = (id) => document.getElementById(id);
        let classes = (classes) => document.getElementsByClassName(classes);
        let startdate = id("startdate");
        let enddate = id("enddate");
        let form = id("form");
        let errorMsg = classes("error");
        // console.log("SIU") ;
        // console.log(startdate.value);
        // console.log(enddate.value);
        form.addEventListener("submit", (e) => {
            let resultsElement = document.querySelector('.output .results');
            if (resultsElement) {
                resultsElement.innerHTML = "";
            }
            let validationPassed2 = true;
            let validationPassed3 = true;
            validationPassed2 = validationPassed2 && engine(startdate, 0, "start date cannot be blank") ;
            validationPassed3 = validationPassed3 && engine(enddate, 1, "end date cannot be blank") ;
            if ( !validationPassed2 || !validationPassed3) {
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
 
                if(id  === plate){
                    if( isNaN(id.value) || id.value <= 0){

                            errorMsg[serial].innerHTML = "";
                            errorMsg[serial].innerHTML = "Please Enter A Valid Plate Number";
                            id.style.border = "2px solid red";
                            return false;
                        }
                }
                errorMsg[serial].innerHTML = "";
                id.style.border = "2px solid green";
                return true;
            }
        };

    </script>

</html>