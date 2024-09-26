<?php
session_start();
if (isset($_SESSION["SESSION_EMAIL"])) {
    header("Location: profile.php");
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
<script type="text/javascript" src="../Car-rental-system/validation/loginValidation.js"></script>

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
                <div class="home active"><a href="#">HOME</a></div>
                <div class="about-us"><a href="#about">ABOUT US</a></div>
                <div class="login "><a href="#testimonials" class="button">TESTIMONIALS</a></div>
                <div class="register "><a href="#contact" class="button">CONTACT US</a></div>
            </div>
        </div>
    </div>
    <!-- End Header -->
    <!-- Start Landing -->
    <div class="landing">
        <div class="overlay"></div>
        <div class="auth-container container">
            <span id="error" style="color:red; font-size: 18px; font-weight: bold;"></span>
            <div class="login-form">
                <div class="text">
                    <span>LUXURY CARS FOR <br> RENT!</span>
                    <p>Login or Sign Up to start making reservations!</p>
                </div>
                <form action="" id="loginForm" method="post">
                    <div class="email">
                        <div class="icon"><i class="fa-regular fa-envelope"></i></div>
                        <input type="text" id="email" name="email" placeholder="Enter Your Email" class="input">
                        <div class="error"></div>
                        <!-- <div class="error"></div> -->
                    </div>
                    <div class="password">
                        <div class="icon"><i class="fa-solid fa-key"></i></div>
                        <input type="password" id="password" name="password" placeholder="Enter Your Password" class="input">
                        <div class="error"></div>
                        <!-- <div class="error"></div> -->
                    </div>
                    <div class="submit">
                        <input id="Submit" type="submit" value="LOGIN">
                    </div>
                    <p>Don't have an account? <a href="signup.php">Sign Up</a></p>
                </form>
            </div>
        </div>
    </div>
    <!-- End Landing -->
    <!-- Start About -->
    <div class="about" id="about">
        <div class="container">
            <div class="main-heading">
                <h2>About Us</h2>
            </div>
            <p>Welcome to Rent Car, where we redefine the way you experience the open road. With a passion for
                unparalleled service and a fleet of meticulously maintained vehicles, we pride ourselves on being your
                go-to destination for seamless and stress-free car rentals. At Rent Car, we understand that every
                journey is unique, and we strive to provide a personalized experience tailored to your specific needs.
                Whether you're embarking on a business trip, a family vacation, or just need a reliable ride for the
                day, our diverse range of vehicles ensures that you'll find the perfect match. Our commitment to
                excellence extends beyond the cars we offer; it's embedded in our customer-centric approach. From our
                easy online booking system to our dedicated customer support, we are here to make your rental experience
                as smooth as the ride in our vehicles. Choose Rent Car for a journey where comfort, reliability, and
                exceptional service come together to elevate your travel experience. Your adventure begins with us!</p>
        </div>
    </div>
    <!-- End About -->
    <!-- Start Testimonials -->
    <div class="testimonials" id="testimonials">
        <div class="container">
            <div class="main-heading">
                <h2>Testimonials</h2>
            </div>
            <div class="text">
                <div class="box">
                    <div class="content">
                        <p>"I've been using RentCar for all my business trips for the past year and I couldn't be
                            happier. The cars are always in top condition and the staff is incredibly helpful and
                            friendly and the car I rented was not only clean and well-maintained but also a joy to
                            drive. I highly recommend RentCar to anyone in need of a reliable rental car."</p>
                        <span>Ahmed Elraggal</span>
                    </div>
                </div>
                <div class="box">
                    <div class="content">
                        <p>
                            "The process of booking online was seamless, The car I rented was not only clean and
                            well-maintained but also a joy to drive. What
                            truly sets Rent Car apart, though, is their outstanding customer service. The staff was
                            friendly, professional. I highly recommend Rent Car to anyone in need of a car rental
                            service."
                        </p>
                        <span>Youssef Magdy</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Testimonials -->


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
                    <li><a href="#">Login</a></li>
                    <li><a href="#about">About Us</a></li>
                    <li><a href="#testimonials">Testimonials</a></li>
                    <li><a href="#contact">Contact Us</a></li>
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