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
 $spec = $_POST['cust'];   
 
 $sql = "
 SELECT r.Reservation_number  , u.SSN, u.FirstName , u.LastName, u.Email  ,
 u.Address , u.city ,u.country , c.CarName , c.brandName, c.category ,r.PlateId
 FROM reservation as r 
 NATURAL JOIN users AS u
 NATURAL JOIN car as c
 WHERE SSN = '$spec'
 ";
 
 $result = $conn->query($sql);
  if ($result === false) {
     echo "Error: " . $conn->error;
 } 
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

    <section class="welcome">
        <div class="container">
            <div class="welpar">
                <div class="welh1">
                    <h1>Welcome!</h1>
                    <h2>Explore Cars</h2>
                </div>

            </div>
            </div>
    </section>
     
    <div class="caratts">
            <div class="container">
                <form action="" method="post" id="form">

                    <div class="brandatts">
                        <label for="cust">Enter Customer SSN</label>
                        <input type="text" name="cust" id="cust">
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
                // Output the reservation information in a box
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="car-info-box">';
                    echo '<h3>Reservation Information</h3>';
                    echo '<form action="" method="post">';

                    echo '<div class="results-box"> ';
                    echo '<label for="reservation_number">Reservation Number:</label>';
                    echo '<input type="text" id="reservation_number" name="reservation_number" value="' . $row["Reservation_number"] . '" readonly>';
                    echo '</div>';

                    echo '<div class="results-box"> ';
                    echo '<label for="ssn">SSN:</label>';
                    echo '<input type="text" id="ssn" name="ssn" value="' . $row["SSN"] . '" readonly>';
                    echo '</div>';

                    echo '<div class="results-box"> ';
                    echo '<label for="fname">Firstname:</label>';
                    echo '<input type="text" id="fname" name="fname" value="' . $row["FirstName"] . '" readonly>';
                    echo '</div>';

                    echo '<div class="results-box"> ';
                    echo '<label for="lname">LastName:</label>';
                    echo '<input type="text" id="lname" name="lname" value="' . $row["LastName"] . '" readonly>';
                    echo '</div>';

                    echo '<div class="results-box"> ';
                    echo '<label for="email">Email:</label>';
                    echo '<input type="text" id="email" name="email" value="' . $row["Email"] . '" readonly>';
                    echo '</div>';

                    echo '<div class="results-box"> ';
                    echo '<label for="address">Address:</label>';
                    echo '<input type="text" id="address" name="address" value="' . $row["Address"] . '" readonly>';
                    echo '</div>';

                    echo '<div class="results-box"> ';
                    echo '<label for="city">City:</label>';
                    echo '<input type="text" id="city" name="city" value="' . $row["city"] . '" readonly>';
                    echo '</div>';

                    echo '<div class="results-box"> ';
                    echo '<label for="country">Country:</label>';
                    echo '<input type="text" id="country" name="country" value="' . $row["country"] . '" readonly>';
                    echo '</div>';

                    echo '<div class="results-box"> ';
                    echo '<label for="carname">Brand Name:</label>';
                    echo '<input type="text" id="carname" name="carname" value="' . $row["brandName"] . '" readonly>';
                    echo '</div>';
                    echo '<div class="results-box"> ';
                    echo '<label for="carname">Category:</label>';
                    echo '<input type="text" id="carname" name="carname" value="' . $row["category"] . '" readonly>';
                    echo '</div>';
                    echo '<div class="results-box"> ';
                    echo '<label for="carname">Car Name:</label>';
                    echo '<input type="text" id="carname" name="carname" value="' . $row["CarName"] . '" readonly>';
                    echo '</div>';

                    echo '<div class="results-box"> ';
                    echo '<label for="plate_id">Plate Id:</label>';
                    echo '<input type="text" id="plate_id" name="plate_id" value="' . $row["PlateId"] . '" readonly>';
                    echo '</div>';

                    echo '</form>';
                    echo '</div>';
                }
            } else {
                echo '<div class="reservation-info-box">';
                echo '<p>No reservations found matching the criteria.</p>';
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
        let startdate = id("cust");
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
            validationPassed2 = validationPassed2 && engine(startdate, 0, "SSN cannot be blank") ;
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