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
$conn8 = new mysqli($host, $username, $password, $database);

$sql_overview = "SELECT DISTINCT OId FROM offices Order by OId"; 
$result_office = $conn8->query($sql_overview);
$oids = [];

if ($result_office->num_rows > 0) {
    while ($row_office = $result_office->fetch_assoc()) {
        $oids[] = $row_office["OId"];
    }
}
?>
<!-- note hwa m4 hysubmit ay 3rbya fel db ela lw enta md5l el byanat zy el db blzbt -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Main Menu</title>
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
                    <h2>Add New Car</h2>
                </div>
             
            </div>
            </div>
    </section>
     
    <div class="caratts">
            <div class="container">
                <form action="addcartodb.php" method="post" id="form"  enctype="multipart/form-data">

                <label for="image">Enter Image:</label>
<input type="file" id="image" name="image" accept="image/jpg, image/jpeg, image/jfif" />




            <label for="Brand">Car Name:</label>
            <input type="text" name="Brand" id="Brand">
                    <div class="error"></div>

                    
            <label for="price">Price per Day:</label>

                        <input type="text" name="price" id="price">
                        <div class="error"></div>
             

                    <label for="airbag">Airbag:</label>
                        <select name="airbag" id="airbag">

                            <option value="Y">Yes</option>
                            <option value="N">No</option>
                        </select>
                        <div class="error"></div>






                        <label for="plate">Plate ID:</label>
                        <input type="text" name="plate" id="plate">
                        <div class="error"></div>
                       


                        <label for="oid">Office Id</label>
                            <select name="oid" id="oid">

                    <?php
                    // Generate HTML options for countries
                    foreach ($oids as $o) {
                    echo '<option value="' . $o . '">' . $o . '</option>';
                    }
                    ?>
                    </select>
                    <div class="error"></div>

                    <label for="status">Car Status:</label>
                    <select name="status" id="status">
                        <option value="Available">Available</option>
                        <option value="Reserved">Reserved</option>
                        <option value="OutOfService">OutOfService</option>

                    </select> 
                    <div class="error"></div>


                    <label for="color">Car Color:</label>
                    <input type="text" name="color" id="color" >
                    <div class="error"></div>

                        <label for="overview">OverView</label>
                        <input type="text" name="overview" id="overview">
                        <div class="error"></div>
   
                        <label for="seatingcapacity">Seating Capacity</label>
                        <input type="text" name="seatingcapacity" id="seatingcapacity">
                        <div class="error"></div>

                        <label for="year">Year</label>

                        <input type="text" name="year" id="year">
                        <div class="error"></div>


                        <label for="airconditioner">Airconditioner:</label>
                        <select name="airconditioner" id="airconditioner">

                            <option value="Y">Yes</option>
                            <option value="N">No</option>
                        </select>
                        <div class="error"></div>

                        <label for="brandname">Brand Name</label>
            <input type="text" name="brandname" id="brandname">
            <div class="error"></div>

            <label for="category">Category</label>
            <input type="text" name="category" id="category">
            <div class="error"></div>
                
                 




                    <div class="submit">            
                    <button class="submit-btn">Submit</button>
                    </div>
                </form>
            </div>
    </div>
           
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script>
        let id = (id) => document.getElementById(id);
        let classes = (classes) => document.getElementsByClassName(classes);
        var ofidunique = true
        let brand = id("Brand");
        let price = id("price");
        let airbag = id("airbag");
        let plate = id("plate");
        let oid = id("oid");
        let status = id("status");
        let color = id("color");
        let overview = id("overview");
        let seatingcapacity = id("seatingcapacity");
        let year = id("year");
        let airconditioner =id("airconditioner") ;
        let brandname =id("brandname") ;
        let category =id("category") ;


        let form = id("form");
        let errorMsg = classes("error");

  
        let uniqueerror = true
        plate.addEventListener("blur", () => {
    const plateid =plate.value;
    console.log(plateid) ;
    if (plateid.trim() !== "") {
        
        $.ajax({
            type: "POST",
            url: "check_plate.php",
            data: { plate_id: plateid },
            success: function(response) {
                if (response === "unique") {
                    console.log("uniqe office id") ;
                    errorMsg[3].innerHTML = "";
                    plate.style.border = "2px solid green";
                    uniqueerror = false;
                } else {
                    console.log("non uniqe office id") ;

                    uniqueerror = true;
                    plate.style.border = "2px solid red";
                    errorMsg[3].innerHTML = "Plate Id already exists";
                }
            },
        });
    } else {
        errorMsg[3].innerHTML = "";
        ofid.style.border = "2px solid green";
        uniqueerror = true;
    }
});


        form.addEventListener("submit", (e) => {
            let validationPassed1 = true;
            let validationPassed2 = true;
            let validationPassed3 = true;
            let validationPassed4 = true;
            let validationPassed5 = true;
            let validationPassed6 = true;
            let validationPassed7 = true;
            let validationPassed8 = true;
            let validationPassed9 = true;
            let validationPassed10 = true;
            let validationPassed11= true;
            let validationPassed12= true;
            validationPassed1 = validationPassed1 && engine(brand, 0, "Brand cannot be blank");
            validationPassed2 = validationPassed2 && engine(price, 1, "price cannot be blank");
            validationPassed4 = validationPassed4 && engine(plate, 3, "plate cannot be blank");
            validationPassed7 = validationPassed7 && engine(color, 6, "color  cannot be blank");
            validationPassed8 = validationPassed8 && engine(overview, 7, "overview  cannot be blank");
            validationPassed9 = validationPassed9 && engine(seatingcapacity, 8, "seating capacity  cannot be blank");
            validationPassed10 = validationPassed10 && engine(year, 9, "year  cannot be blank");
            validationPassed11 = validationPassed11 && engine(brandname, 11, "brand name  cannot be blank");
            validationPassed12 = validationPassed12 && engine(category, 12, "category  cannot be blank");
            e.preventDefault();
            




            if (uniqueerror) {
                console.log("Helllo");
                plate.style.border = "2px solid red";
                errorMsg[3].innerHTML = "Plate Id already exists";
            }

            if ( !validationPassed1 || !validationPassed2 ||  !validationPassed4 ||
             !validationPassed7 || !validationPassed8 ||
              !validationPassed9 || !validationPassed10 ||! validationPassed12 ||uniqueerror) {
            e.preventDefault();
        }
        else{
            form.submit() ;
        }
        });

        let engine = (id, serial, message) => {
            if (id.value.trim() === "") {
                errorMsg[serial].innerHTML = "";
                errorMsg[serial].innerHTML = message;
                id.style.border = "2px solid red";
                return false;
            } else {
                if(id === color){
                    if(/\d/.test(id.value)){
                        errorMsg[serial].innerHTML="" ;
                        errorMsg[serial].innerHTML="You Shouldnot enter number in colors" ;
                                                id.style.border = "2px solid red";
                        return false;

                    }

                }

                if(id === price){
                   if( isNaN(id.value) || id.value <= 0){

                        errorMsg[serial].innerHTML = "";
                        errorMsg[serial].innerHTML = "Please Enter A Valid Price";
                        id.style.border = "2px solid red";
                        return false;
                   }
                }
                if(id  === plate){
                    if( isNaN(id.value) || id.value <= 0){

                            errorMsg[serial].innerHTML = "";
                            errorMsg[serial].innerHTML = "Please Enter A Valid Plate Number";
                            id.style.border = "2px solid red";
                            return false;
                        }
                }
                if(id === year ){
                    let pattern = /^(19|20)\d{2}$/;
                    if (! pattern.test(id.value)) {
                        errorMsg[serial].innerHTML = "";
                            errorMsg[serial].innerHTML = "Please Enter A Valid Year";
                            id.style.border = "2px solid red";
                            return false;
                                    }
                }

                errorMsg[serial].innerHTML = "";
                id.style.border = "2px solid green";
                return true;
            }
        };

        function checkForNumbers(inputValue) {
      var containsNumbers = /\d/.test(inputValue);
      
      var resultElement = document.getElementById("no");
      if (containsNumbers) {
        resultElement.innerText = "Input contains numbers!";
      } else {
        resultElement.innerText = "";
      }
    }

    </script>


    </html>