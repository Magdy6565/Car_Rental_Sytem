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
    $sqlav = "
    SELECT c.PlateId
    FROM car AS c
    WHERE c.PlateId NOT IN (
        SELECT c.PlateID
        FROM car AS c
        NATURAL JOIN reservation as r
        WHERE '$start' BETWEEN r.pickup_date AND r.return_date
    )
    ";

    $resultavailable = $conn->query($sqlav);
    // echo  $sqlav ;
    if ($resultavailable === false) {
        echo "Error: " . $conn->error;
    }

    $sqlrented = "
    SELECT c.PlateID
    FROM car AS c
     JOIN reservation as r ON c.PlateId = r.PlateId
    WHERE '$start' BETWEEN r.pickup_date AND r.return_date
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
                <label for="startdate">Enter A Day</label>
                <input type="date" id="startdate" name="startdate">
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
        <!-- <h2>Rented Cars On D</h2> -->
        <?php
        // Display the results
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($resultrented)) {
            echo '<div class="results">';
            // Check if there are rows in the result
            echo '<h3 style="width :100% ;" >Reserved Cars On This Day</h3>';

            if ($resultrented->num_rows > 0) {
                // Output the car information in a box
                while ($row = $resultrented->fetch_assoc()) {
                    echo '<div class="car-info-box">';
                    echo '<form action="" method="post">';
                    
                    echo '<div class="results-box"> ';
                    echo '<label for="plateid">Plate Id:</label>' ;
                    // print_r( $row );
                    echo '<input type="text" id="plateid" name="plateid" value="' . $row["PlateID"] . '" readonly>';
                    // echo '<input type="text" id="plateid" name="plateid" value="7amada" readonly>';
                    echo '</div>';
                    echo '<div class="results-box"> ';
                    echo '<label for="status">Status:</label>' ;
                    echo '<input type="text" id="status" name="status" value="Rented" readonly>';
                    echo '</div>';
                    echo '</form>';
                    echo '</div>';
                }
            } else {
                echo '<div class="car-info-box">';
                echo '<p>No reserved Cars on This Day.</p>';
                echo '</div>';
            }
            echo '</div>';
        }

        
        ?>



    <!-- <h2>Available Cars On Day </h2> -->
        <?php
        // Display the results
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($resultavailable)) {
            echo '<div class="results av">';
            echo '<h3 style="width :100% ;" ">Available Cars On This Day</h3>';

            // Check if there are rows in the result
            if ($resultavailable->num_rows > 0) {
                // Output the car information in a box
                while ($row = $resultavailable->fetch_assoc()) {
                    echo '<div class="car-info-box">';
                    // echo '<h3>Reservation Information</h3>';
                    echo '<form action="" method="post">';
                    
                    echo '<div class="results-box"> ';
                    echo '<label for="plateid">Plate Id:</label>' ;
                    echo '<input type="text" id="plateid" name="plateid" value="' . $row["PlateId"] . '" readonly>';
                    echo '</div>';
                    echo '<div class="results-box"> ';
                    echo '<label for="status">Status:</label>' ;
                    echo '<input type="text" id="status" name="status" value="Available" readonly>';
                    echo '</div>';
                    echo '</form>';
                    echo '</div>';
                }
            } else {
                echo '<div class="car-info-box">';
                echo '<p>No Available cars on this day.</p>';
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
            let resultsElement2 = document.querySelector('.output .av');
    if (resultsElement) {
        resultsElement.innerHTML = "";
    }
    if (resultsElement2) {
        resultsElement2.innerHTML = "";
    }

            let validationPassed2 = true;
            validationPassed2 = validationPassed2 && engine(startdate, 0, "Date cannot be blank") ;
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