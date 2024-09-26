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
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //echo 'Hello from post if' ;
    $color = $_POST["color"];
    $brandname = $_POST["bd"];
    $category = $_POST["catego"];
    $brand = $_POST["brand"];
    $overview = $_POST["overview"] ; 
    $price = $_POST["price_per_day"];
    $status = $_POST['status'];
    $airbag = $_POST['airbag'];
    $plate_id = $_POST["plate_id"];
    $seatingcapacity = $_POST['seatingcapacity'] ; 
    $year = $_POST['year'] ; 
    $airconditioner = $_POST['airconditioner'] ; 
    $oid = $_POST['oid'] ;

 // ***************************************************************************************************
//  Handling delete any car using plate_id as its the primary key
    if (isset($_POST['delete'])) {
        // Delete the car from the database
        
        $sql = "DELETE FROM car WHERE PlateId = '$plate_id'";
        if ($conn->query($sql) === TRUE) {
            echo '<p style="color: green;">Car deleted successfully!</p>';
           // echo $sql ;
            header('Location: temp.php');
            exit();
                    } else {
            echo '<p style="color: red;">Error deleting car: ' . $conn->error . '</p>';
        }
    }
 // ***************************************************************************************************
//  Handling edit requests 

    // Check if any input is empty
    // if (empty($color) || empty($brand) || empty($price) || empty($status) || empty($airbag) || empty($plate_id)) {
    // } 
    if(empty($price)){
        //donot accept editing 
       // echo("Price fadyyy") ;
    }
    else {
        //echo("Price m4 fady") ; 
        //echo("again") ;

        // Check if the user clicked the "Submit" button
        if (isset($_POST['submit'])) {
            // Update the car in the database
          //  echo("ANA 3mlt submit");
            // Convert the price to an integer
            $price = intval($_POST["price_per_day"]);
            
            // echo($price) ;
            // echo("\n") ;
            // echo($plate_id);

            // Update the car in the database
            $sql = "UPDATE car
                    SET PricePerDay = '$price' , Status = '$status'
                    WHERE  PlateId = '$plate_id'";
            //echo $sql ;
            if ($conn->query($sql) === TRUE) {
              //  echo("7amada") ;
               header('Location: temp.php');
            } else {
               //echo '<p style="color: red;">Error updating car: ' . $conn->error . '</p>';
            }
        }


    }
}
 // ***************************************************************************************************

$conn->close();
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
                    <h2>Edit The Car </h2>
                </div>
                <div class="image">
                    <img src="./images.jfif" alt="car photo is not here now">
                </div>
            </div>
            </section>

            <div class="caratts">
            <div class="container">
            <form action="" method="post">

                    <div class="brandatts">
                        <label for="plate_id">Plate ID:</label>
                        <input type="text" name="plate_id" id="plate_id" value='<?php echo $plate_id?>' readonly>
                        
                        <label for="price">Price per Day:</label>
                        <input type="text" name="price_per_day" id="price_per_day" >
                    </div>

                 
                   <!-- 
 <select name="color" id="color">
                    <?php
                    // Generate HTML options for countries
                    // foreach ($colors as $color) {
                    // echo '<option value="' . $color . '">' . $color . '</option>';
                    // }
                    ?>
                    </select> -->
                <div class="brandatts">
                <label for="bd">Brand Name</label>
                        <input type="text"  name="bd" id="bd" value='<?php echo  $brandname?>' readonly>
                    <label for="brand">Car Name:</label>
                    <input type="text" name="brand" id="brand" value='<?php echo $brand?>' readonly>
   

                        
                </div>
    
                    <div class="brandatts">
                        <label for="seatingcapacity">Seating Capacity</label>
                        <input type="text" name="seatingcapacity" id="seatingcapacity" value='<?php echo $seatingcapacity?>' readonly>

                        </select> 

                        <label for="year">Year</label>

                        <input type="text" name="year" id="year" value='<?php echo $year?>' readonly>

                    </div>


                    <div class="brandatts">
                        <label for="airbag">Airbag:</label>
                        <input type="text" name="airbag" id="airbag" value='<?php echo $airbag?>' readonly>

                        <label for="airconditioner">Airconditioner:</label>
                        <input type="text" name="airconditioner" id="airconditioner" value='<?php echo $airconditioner?>' readonly>

                    </div>


                    <div class="brandatts">
                    <label for="status">Car Status:</label>
                    <select name="status" id="status">
                        <option value="Available">Available</option>
                        <option value="Reserved">Reserved</option>
                        <option value="OutOfService">OutOfService</option>

                    </select> 

    <label for="color">Car Color:</label>
                    <input type="text" name="color" id="color" value='<?php echo $color?>' readonly>
                    </div>


                    <div class="brandatts">
                        <label for="oid">Office Id</label>
                        <input type="text"  name="oid" id="oid" value='<?php echo  $oid?>' readonly>
                        <!-- brandname -->
                        <label for="overview">OverView</label>
                        <input type="text" name="overview" id="overview" value='<?php echo $overview?>' readonly>
    

                    </div>
                    <div class="brandatts">
                        <!-- siuu -->
                    <label for="catego">Category</label>
                    <input type="text"  name="catego" id="catego" value='<?php echo  $category?>' readonly>

                    </div>
             <!-- <input type="submit" name="submit" value="edit" class = "submit-btn"> -->
            <button class="submit-btn" type="submit" name="submit" id='submit'>Submit</button>
            <button class="delete-btn" type="submit" name="delete">Delete</button>

                </form>
                <!-- <form action="" method="post">
    <button class="delete-btn" type="submit" name="delete">Delete</button>
                </form> -->
            </div>
    </div>



</body>
<script>
document.addEventListener('DOMContentLoaded', function () {
    var submitButton = document.getElementById('submit');
    var priceInput = document.getElementById('price_per_day');

    submitButton.addEventListener('click', function (event) {
        if (priceInput.value.trim() === '' || priceInput.value <= 0 ) {
            alert('Please enter a valid price ');
            event.preventDefault(); // Prevent form submission if validation fails
        }
    });
});
</script>
</html>
