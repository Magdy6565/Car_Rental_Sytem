<?php
session_start();
if (!isset($_SESSION["SESSION_EMAIL"])) {
    header("Location: index.php");
}

$plateid=$_POST["plateids"];
$ssn=$_POST["ssn"];
$price  =$_POST['priceperday'] ;


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, height=device-height, initial-scale=1, maximum-scale=1, user-scalable=0">
    <title>RentCar</title>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/master.css">
    <!-- <link rel="stylesheet" href="css/master.css"> -->
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
        
</head>

<body>

</body>

</html>

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
                <div class="login "><a href="userprofile.php" class="button">PROFILE</a></div>
                <div class="register "><a href="logout.php">LOG OUT</a></div>
            </div>
        </div>
    </div>
    <!-- End Header -->
    <div class="containers">

        <form action="process.php" method="POST">
                    <input type="text" name="priceperday" id="priceperday" value="<?php echo $price ;  ?>" hidden>
                    <input type="text" name="ssn" id="ssn" value="<?php echo $ssn; ?>" hidden >
                    <input type="text" id="plateids" name="plateids" value="<?php echo $plateid; ?>" hidden>
                    <div class="dates">
                        <div class="date1">
                            <input type="date" placeholder="Enter Start Date" name="start-date" id="start-date" class="inputs"
                            value="<?php echo $_POST['start-date']; ?>"
                            hidden
                            >
                        </div>
                        <div class="date2">
                            <input type="date" placeholder="Enter End Date" name="end-date" id="end-date" class="inputs"
                            value="<?php echo $_POST['end-date']; ?>"
                            hidden
                            >



            <input type="text" name="plateid" id="plateid" value="<?php echo $plateid; ?>" hidden>

            <div class="row">

                <div class="col">
                    <h3 class="title">Billing Address</h3>

                    <div class="inputBox">
                        <label for="name">Full Name:</label>
                        <input type="text" id="name" placeholder="Enter your full name" required>
                    </div>

                    <div class="inputBox">
                        <label for="email">Email:</label>
                        <input type="text" id="email" placeholder="Enter email address" required>
                    </div>

                    <div class="inputBox">
                        <label for="address">Address:</label>
                        <input type="text" id="address" placeholder="Enter address" required>
                    </div>

                    <div class="inputBox">
                        <label for="city">City:</label>
                        <input type="text" id="city" placeholder="Enter city" required>
                    </div>

                    <div class="flex">

                        <div class="inputBox">
                            <label for="state">State:</label>
                            <input type="text" id="state" placeholder="Enter state" required>
                        </div>

                        <div class="inputBox">
                            <label for="zip">Zip Code:</label>
                            <input type="number" id="zip" placeholder="123 456" required>
                        </div>

                    </div>

                </div>
                <div class="col">
                    <h3 class="title">Payment</h3>

                    <div class="inputBox">
                        <label for="name">Card Accepted:</label>
                        <img src="https://i.ibb.co/X38b5PF/card-img.png" alt="">
                    </div>

                    <div class="inputBox">
                        <label for="cardName">Name On Card:</label>
                        <input type="text" id="cardName" placeholder="Enter card name" required>
                    </div>

                    <div class="inputBox">
                        <label for="cardNum">Credit Card Number:</label>
                        <input type="text" name= "cardNum" id="cardNum" placeholder="1111-2222-3333-4444" maxlength="19" required>
                    </div>

                    <div class="inputBox">
                        <label for="">Exp Month:</label>
                        <select name="" id="">
                            <option value="">Choose month</option>
                            <option value="January">January</option>
                            <option value="February">February</option>
                            <option value="March">March</option>
                            <option value="April">April</option>
                            <option value="May">May</option>
                            <option value="June">June</option>
                            <option value="July">July</option>
                            <option value="August">August</option>
                            <option value="September">September</option>
                            <option value="October">October</option>
                            <option value="November">November</option>
                            <option value="December">December</option>
                        </select>
                    </div>


                    <div class="flex">
                        <div class="inputBox">
                            <label for="">Exp Year:</label>
                            <select name="" id="">
                                <option value="">Choose Year</option>
                                <option value="2023">2023</option>
                                <option value="2024">2024</option>
                                <option value="2025">2025</option>
                                <option value="2026">2026</option>
                                <option value="2027">2027</option>
                            </select>
                        </div>

                        <div class="inputBox">
                            <label for="cvv">CVV</label>
                            <input type="number" id="cvv" placeholder="1234" required>
                        </div>
                    </div>

                </div>

            </div>

            <input type="submit" value="Checkout" class="submit_btn">
        </form>

    </div>



</body>


<script>
    var cardNumInput = document.querySelector('#cardNum')

    cardNumInput.addEventListener('keyup', () => {
        let cNumber = cardNumInput.value
        cNumber = cNumber.replace(/\s/g, "")

        if (Number(cNumber)) {
            cNumber = cNumber.match(/.{1,4}/g)
            cNumber = cNumber.join(" ")
            cardNumInput.value = cNumber
        }
    })


    
</script>