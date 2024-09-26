<?php
session_start();
if (!isset($_SESSION["SESSION_EMAIL"])) {
    header("Location: ../index.php");
}
$host = "localhost";
$username = "root";
$password = "";
$database = "car_rental_system";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['Email'];
}

$email = $_SESSION["SESSION_EMAIL"];
$conn = new mysqli($host, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$sql = "SELECT * FROM users WHERE EMAIL = '$email'";
$result = $conn->query($sql);


$sql2 =
    " SELECT r.*  
    FROM reservation AS r 
    JOIN  users AS  u
    ON r.SSN = u.SSN  
    WHERE u.Email = '$email'
    ";
$result2 = $conn->query($sql2);
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1, maximum-scale=1, user-scalable=0">
    <title>RentCar</title>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/master.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Rubik:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<body>
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
                    <i class="fas fa-envelope"></i> contact@rentcar.com
                </div>
            </div>
        </div>
    </div>
    <!-- End Header bar -->

    <!-- Start Header -->
    <div class="header" id="header">
        <div class="container">
            <div class="logo">
                <img src="../Car-rental-system/images/logo.png" alt="">
            </div>
            <div class="rl-container">
                <div class="home"><a href="profile.php">HOME</a></div>
                <div class="search"><a href="search.php">SEARCH</a></div>
                <div class="login active"><a href="userprofile.php" class="button">PROFILE</a></div>
                <div class="register "><a href="logout.php">LOG OUT</a></div>
            </div>
        </div>
    </div>
    <!-- End Header -->
    <div class="main-header profile">
        <div class="text">
            <h1>Profile</h1>
            <p>Reservations And User Info</p>
        </div>
        <div class="overlay"></div>
    </div>

    <div class="profile-info">
        <div class="container">

            <?php
            if ($result->num_rows > 0) {
                // Output the car information in a box
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="input-container">';
                    echo '<input type="text" id = "ssn" name="ssn" value="SSN : ' . $row["SSN"] . '" readonly>';
                    echo '<input type="text" id = "fname" name="fname" value="First Name : ' . $row["FirstName"] . '" readonly>';
                    echo '<input type="text" id = "lname" name="lname" value="Last Name : ' . $row["LastName"] . '" readonly>';
                    echo '<input type="text" id = "email" name="email" value="Email : ' . $row["Email"] . '" readonly>';
                    echo '<input type="text" id = "contactno" name="contactno" value="Contact Number : ' . $row["ContactNo"] . '" readonly>';
                    echo '<input type="text" id = "dob" name="dob" value="Date Of Birth : ' . $row["dob"] . '" readonly>';
                    echo '<input type="text" id = "address" name="address" value="Address : ' . $row["Address"] . '" readonly>';
                    echo '<input type="text" id = "city" name="city" value="City : ' . $row["City"] . '" readonly>';
                    echo '<input type="text" id = "country" name="country" value="Country : ' . $row["Country"] . '" readonly>';
                    echo '</div>';
                }
            }
            ?>
        </div>
    </div>


    <div class="main-heading">
        <h2>Reservations</h2>
    </div>
    <div class="reservation-info">
        <div class="container">
            <div class="reservations-holder">
                <?php
                if ($result2->num_rows > 0) {
                    while ($row = $result2->fetch_assoc()) {
                        echo '<div class="separator"></div>';
                        echo '<div class="reserve">';
                        echo '<input type="text" id = "rnum" name="rnum" value="Reservation # : ' . $row["Reservation_number"] . '" readonly>';
                        echo '<input type="text" id = "plateid" name="plateid" value="Plate Id : ' . $row["PlateId"] . '" readonly>';
                        echo '<input type="text" id = "pickupdate" name="pickupdate" value="Pickup Date : ' . $row["pickup_date"] . '" readonly>';
                        echo '<input type="text" id = "returndate" name="returndate" value="Return Date : ' . $row["return_date"] . '" readonly>';
                        echo '<input type="text" id = "paymentmethod" name="paymentmethod" value="Payment Method : ' . $row["Payment_method"] . '" readonly>';
                        echo '<input type="text" id = "totalprice" name="totalprice" value="Total Price : $' . $row["Total_price"] . '" readonly>';
                        echo '</div>';
                    }
                } else {
                    echo '<div class="no-res">No Reservations Available!</div>';
                }
                ?>
            </div>
        </div>
    </div>
    <!-- Start Footer -->
    <div class="footer">
        <div class="container">
            <div class="box">
                <h3>RENT CAR</h3>
                <ul class="social">
                    <li>
                        <a href="#" class="facebook">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="twitter">
                            <i class="fab fa-twitter"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="youtube">
                            <i class="fab fa-youtube"></i>
                        </a>
                    </li>
                </ul>
                <p class="text">
                    Where quality meets convenience: Rent with us and enjoy the journey
                </p>
            </div>
            <div class="box">
                <ul class="links">
                    <li><a href="profile.php">Home</a></li>
                    <li><a href="search.php">Search</a></li>
                    <li><a href="userprofile.php">Profile</a></li>
                    <li><a href="logout.php">Log Out</a></li>
                </ul>
            </div>
            <div class="box">
                <div class="line">
                    <i class="fas fa-map-marker-alt fa-fw"></i>
                    <div class="info">Room 100, Street 1111, Smouha, Alexandria, Egypt</div>
                </div>
                <div class="line">
                    <i class="far fa-clock fa-fw"></i>
                    <div class="info">Business Hours: From 8:00 AM To 4:00 PM</div>
                </div>
                <div class="line">
                    <i class="fas fa-phone-volume fa-fw"></i>
                    <div class="info">
                        <span>+01234567891</span>
                    </div>
                </div>
            </div>

        </div>
        <p class="copyright">&copy; 2024 RENT CAR Ltds | All rights reserved
</p>
    </div>
    <!-- End Footer -->





</body>

</html>