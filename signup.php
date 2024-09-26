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
<script type="text/javascript" src="../Car-rental-system/validation/registerValidation.js"></script>

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
                <div class="home"><a href="index.php">HOME</a></div>
                <div class="about-us"><a href="index.php#about">ABOUT US</a></div>
                <div class="login "><a href="index.php#testimonials" class="button">TESTIMONIALS</a></div>
                <div class="register "><a href="index.php#contact" class="button">CONTACT US</a></div>
            </div>
        </div>
    </div>
    <!-- End Header -->
    <!-- Start Landing -->
    <div class="landing">
        <div class="overlay"></div>
        <div class="container auth-container signup">
            <!-- <div id="error" style="display: block; height: 20px; text-align: center; color: #ddd; margin-bottom: 20px;"></div> -->
            <div class="signup-form">
                <div class="text">
                    <span>LUXURY CARS FOR <br> RENT!</span>
                    <p>Login or Sign Up to start making reservations!</p>
                </div>
                <form action="" id="signupForm" method="post">
                    <div class="left">
                        <div class="first-name">
                            <input type="text" id="fname" name="fname" placeholder="Enter Your Firstname" class="inputs">
                            <div class="error"></div>
                        </div>
                        <div class="last-name">
                            <input type="text" id="lname" name="lname" placeholder="Enter Your Lastname" class="inputs">
                            <div class="error"></div>
                        </div>
                        <div class="email">
                            <input type="text" id="email" name="email" placeholder="Enter Your Email" class="inputs">
                            <div class="error"></div>
                        </div>
                        <div class="password">
                            <input type="password" id="password" name="password" placeholder="Enter Your Password" class="inputs">
                            <div class="error"></div>
                        </div>
                        <div class="cpassword">
                            <input type="password" id="cpassword" name="cpassword" placeholder="Confirm Password" class="inputs">
                            <div class="error"></div>
                        </div>
                        <div class="ssn">
                            <input type="text" name="ssn" id="ssn" placeholder="Enter Your SSN" class="inputs">
                            <div class="error"></div>
                        </div>
                    </div>

                    <div class="right">
                        <div class="dob">
                            <input type="text" placeholder="Enter Date Of Birth" name="dob" id="dob" onfocus="(this.type='date')" class="inputs">
                            <div class="error"></div>
                        </div>
                        <div class="address">
                            <input type="text" name="address" id="address" placeholder="Enter Address" class="inputs">
                            <div class="error"></div>
                        </div>
                        <div class="contact">
                            <input type="tel" name="contact_number" id="contact_number" placeholder="Enter Contact Number" class="inputs">
                            <div class="error"></div>
                        </div>
                        <div class="city">
                            <input type="text" name="city" id="city" placeholder="Enter City" class="inputs">
                            <div class="error"></div>
                        </div>
                        <div class="country">
                            <input type="text" name="country" id="country" placeholder="Enter Country" class="inputs">
                            <div class="error"></div>
                        </div>
                        <div class="submit">
                            <input type="submit" value="SIGN UP">
                        </div>
                    </div>
                </form>
                <p>Already have an account? <a href="index.php">Login</a></p>
            </div>
        </div>
    </div>


</body>


</html>