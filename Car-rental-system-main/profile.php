<?php
session_start();
if (!isset($_SESSION["SESSION_EMAIL"])) {
    header("Location: index.php");
}
include 'config.php';
$today = date("Y-m-d");
mysqli_query($conn, "UPDATE car as c set Status = 'Available' where c.PlateId in
(select r.PlateId from reservation as r where return_date ='$today')");
mysqli_query($conn, "UPDATE car as c set Status = 'rented' where c.PlateId in
(select r.PlateId from reservation as r where pickup_date ='$today')");
$result = mysqli_query($conn, "SELECT * FROM users WHERE email='{$_SESSION["SESSION_EMAIL"]}'");
//echo $_SESSION['SESSION_EMAIL'];
if (mysqli_num_rows($result) > 0) {
    $data = mysqli_fetch_array($result);
}
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
                <div class="home active"><a href="profile.php">HOME</a></div>
                <div class="about-us"><a href="search.php">SEARCH</a></div>
                <div class="login "><a href="userprofile.php" class="button">PROFILE</a></div>
                <div class="register "><a href="logout.php">LOG OUT</a></div>
            </div>
        </div>
    </div>
    <!-- End Header -->
    <!-- Start Cars Available -->
    <div class="main-header reserve">
        <div class="text">
            <h1>Reservations</h1>
            <p>Choose a car to make a reservation </p>
        </div>
        <div class="overlay"></div>
    </div>
    <div class="cars-available">
        <div class="container">
            <!-- <div class="main-heading">
                <h2>Cars Available For Rent</h2>
            </div> -->
            <?php
            $sql = "SELECT * FROM Car where status = 'Available'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {


                echo '<div class="image-container">';
                while ($row = $result->fetch_assoc()) {
                    echo  '<div class="car-box">';
                    echo        '<div class="image">';
                    echo            '<img src="data:image/jpeg;base64,' . base64_encode($row["Image"]) . '" alt="Car Image">';
                    echo        '</div>';
                    echo        '<div class="text">';
                    echo            '<div class="brand-name">' . $row["brandName"] . '</div>';
                    echo            '<div class="cname">' . $row["CarName"] . '</div>';
                    echo            '<div class="ppd"> Now at <span>$' . $row["PricePerDay"] . '</span> per day</div>';
                    echo        '</div>';
                    echo        '<form action="reserve.php" method="POST">';
                    echo            '<input type="text" name="plateid" id="plateid" value="' . $row["PlateId"] . '" readonly hidden>';
                    echo            '<button class="submit">RENT CAR</button>';
                    echo        '</form> ';
                    echo  '</div>';
                }
                echo '</div>';
            }
            ?>
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