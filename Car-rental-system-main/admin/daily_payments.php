<?php 
session_start();
if (!isset($_SESSION["SESSION_EMAIL"])) {
    header("Location: ../index.php");
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
<form method="post" action="" id="form">
                    <div class="brandatts">
                    <label for="startDate">Start Date:</label>
                    <input type="date" name="startDate" id="startDate" >
                    <div class="error"></div>

                    <label for="endDate">End Date:</label>
                    <input type="date" name="endDate"  id="endDate">
                    <div class="error"></div>

                    </div>


                    <div class="submit">            
                                    <button class="submit-btn">Submit</button>
                                    </div>
                </form>
</div>
</div>

<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve user input
    $startDate = $_POST["startDate"];
    $endDate = $_POST["endDate"];

    // Replace these variables with your actual database connection details
    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "car_rental_system";

    // Connect to the database
    $conn = new mysqli($host, $username, $password, $database);

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    // <div class="output">
    // <div class="container">
    echo '<div class="output">' ;
    echo '<div class="container">' ;
    echo '<div class="results">';
    
    // echo $startDate ;
    while($startDate <= $endDate){
        // echo $startDate ;
    // SQL query to retrieve daily profits
    $sql = "
        SELECT
            '$startDate' AS Day,
            COALESCE(SUM(c.PricePerDay), 0) AS DailyProfit
        FROM
            Reservation
        NATURAL JOIN car c
        WHERE
            '$startDate' BETWEEN pickup_date AND return_date
        GROUP BY
            Day
     
    ";

    // Execute the query
    $result = $conn->query($sql);
    echo '<div class="car-info-box">';
    echo "<h3>Daily Profits</h3>";
    echo '<form action="" method="post">';

    echo '<div class="results-box"> ';

    // Display the results
    if ($result->num_rows > 0) {

        // echo "<h3>Daily Profits</h3>";
        // echo "<table border='1'>";
        // echo "<tr><th>Day</th><th>Daily Profit</th></tr>";

        while ($row = $result->fetch_assoc()) {
            // echo "<tr>";
            // echo "<td>{$row['Day']}</td>";
            // echo "<td>{$row['DailyProfit']}</td>";
            // echo "</tr>";
            echo '<label for="brand">Day:</label>' ;
            echo '<input type="text" id = "brand" name="brand" value="' . $row["Day"] . '" readonly>';
            echo '<label for="brand">Daily Profit:</label>' ;
            echo '<input type="text" id = "brand" name="brand" value="' . $row["DailyProfit"] . '" readonly>';
        }

        // echo "</table>";
    } else {
        // echo "<h3>Daily Profits</h3>";
        // echo "<table border='1'>";
        // echo "<tr><th>Day</th><th>Daily Profit</th></tr>";
        // echo "<tr>";
        // echo "<td>{$startDate}</td>";
        // echo "<td>0</td>";
        // echo "</tr>";  
        echo '<label for="brand">Day:</label>' ;
        echo '<input type="text" id = "brand" name="brand" value="' . $startDate . '" readonly>';
        echo '<label for="brand">Daily Profit:</label>' ;
        echo '<input type="text" id = "brand" name="brand" value="0" readonly>';  
    
    }
    // $startDate = strtotime("+1 day", strtotime($startDate));
    $date = new DateTime($startDate);
$date->modify('+1 day');
$startDate = $date->format('Y-m-d');
echo '</div>' ;
echo '</form>' ;
echo '</div>' ;

    }


    // Close the database connection
    $conn->close();
}
echo '</div>';
echo '</div>';
echo '</div>';
?>


</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script>
        let id = (id) => document.getElementById(id);
        let classes = (classes) => document.getElementsByClassName(classes);
        let startdate = id("startDate");
        let enddate = id("endDate");
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
