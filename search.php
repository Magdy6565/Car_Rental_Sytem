<?php
session_start();
if (!isset($_SESSION["SESSION_EMAIL"])) {
    header("Location: index.php");
}
include 'config.php';
$result = mysqli_query($conn, "SELECT * FROM users WHERE email='{$_SESSION["SESSION_EMAIL"]}'");
//echo $_SESSION['SESSION_EMAIL'];
if (mysqli_num_rows($result) > 0) {
    $data = mysqli_fetch_array($result);
}
?>


<?php
/******************************************************************************* */
// i use this query to get all distinct colors in db and put them in options of color 

$sql_colors = "SELECT DISTINCT Color FROM car";
$result_colors = $conn->query($sql_colors);
$colors = [];

if ($result_colors->num_rows > 0) {
    while ($row_country = $result_colors->fetch_assoc()) {
        $colors[] = $row_country["Color"];
    }
}

/******************************************************************************* */
// i use this query to get all car overviews from db

$sql_overview = "SELECT DISTINCT Overview FROM car";
$result_overview = $conn->query($sql_overview);
$overviews = [];

if ($result_overview->num_rows > 0) {
    while ($row_overview = $result_overview->fetch_assoc()) {
        $overviews[] = $row_overview["Overview"];
    }
}
/******************************************************************************* */
// i use this query to get all distinct seating capacity

$sql_overview = "SELECT DISTINCT Seating_capacity FROM car ORDER BY Seating_capacity";
$result_seat = $conn->query($sql_overview);
$seats = [];

if ($result_seat->num_rows > 0) {
    while ($row_seat = $result_seat->fetch_assoc()) {
        $seats[] = $row_seat["Seating_capacity"];
    }
}

/******************************************************************************* */
// i use this query to get all distinct  years 


$sql_overview = "SELECT DISTINCT Year FROM car";
$result_year = $conn->query($sql_overview);
$years = [];

if ($result_year->num_rows > 0) {
    while ($row_year = $result_year->fetch_assoc()) {
        $years[] = $row_year["Year"];
    }
}
/******************************************************************************* */
$sql_overview = "SELECT DISTINCT Country FROM offices";
$result_country = $conn->query($sql_overview);
$countries = [];

if ($result_country->num_rows > 0) {
    while ($row_country = $result_country->fetch_assoc()) {
        $countries[] = $row_country["Country"];
    }
}
/******************************************************************************* */

/******************************************************************************* */
$sql_brandname = "SELECT DISTINCT brandName FROM car    ";
$result_count3 = $conn->query($sql_brandname);
$brandnames = [];

if ($result_count3->num_rows > 0) {
    while ($row_count3 = $result_count3->fetch_assoc()) {
        $brandnames[] = $row_count3["brandName"];
    }
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
                <div class="home"><a href="profile.php">HOME</a></div>
                <div class="search active"><a href="search.php">SEARCH</a></div>
                <div class="login "><a href="userprofile.php" class="button">PROFILE</a></div>
                <div class="register "><a href="logout.php">LOG OUT</a></div>
            </div>
        </div>
    </div>
    <!-- End Header -->
    <div class="main-header search">
        <div class="text">
            <h1>Search</h1>
            <p>Search For A Car Suitable For You </p>
        </div>
        <div class="overlay"></div>
    </div>

    <div class="caratts">
        <div class="container">
            <form action="" method="post" id="form">
                <div class="inputs-container">
                    <div class="left">
                        <div class="ppd">
                            <label for="price">Price per Day:</label>
                            <input type="text" name="price" id="price">
                        </div>

                        <div class="brand-name">
                            <label for="Brand">Car Name:</label>
                            <input type="text" name="Brand" id="Brand">
                        </div>

                        <div class="oview">
                            <label for="overview">OverView</label>
                            <select name="overview" id="overview">
                                <option value="Null"></option>
                                <?php
                                foreach ($overviews as $overview) {
                                    echo '<option value="' . $overview . '">' . $overview . '</option>';
                                }
                                ?>
                            </select>
                        </div>

                        <div class="clr">

                            <label for="color">Car Color:</label>
                            <select name="color" id="color">
                                <option value="Null"></option>
                                <?php
                                // Generate HTML options for countries
                                foreach ($colors as $color) {
                                    echo '<option value="' . $color . '">' . $color . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <div class="sc">
                            <label for="seatingcapacity">Seating Capacity</label>
                            <select name="seatingcapacity" id="seatingcapacity">
                                <option value="Null"></option>

                                <?php
                                foreach ($seats as $s) {
                                    echo '<option value="' . $s . '">' . $s . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="right">


                        <div class="yr">
                            <label for="year">Year</label>
                            <select name="year" id="year">
                                <option value="Null"></option>

                                <?php
                                foreach ($years as $y) {
                                    echo '<option value="' . $y . '">' . $y . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <div class="brand">
                            <label for="brandname">Brand Name:</label>
                            <select name="brandname" id="brandname">
                                <option value="Null"></option>

                                <?php
                                foreach ($brandnames as $o) {
                                    echo '<option value="' . $o . '">' . $o . '</option>';
                                }
                                ?>
                            </select>
                        </div>

                        <div class="ab">
                            <label for="airbag">Airbag:</label>
                            <select name="airbag" id="airbag">
                                <option value="Null"></option>

                                <option value="Y">Yes</option>
                                <option value="N">No</option>
                            </select>
                        </div>
                        <div class="ac">
                            <label for="airconditioner">Airconditioner:</label>
                            <select name="airconditioner" id="airconditioner">
                                <option value="Null"></option>

                                <option value="Y">Yes</option>
                                <option value="N">No</option>
                            </select>
                        </div>

                        <div class="cty">
                            <label for="country">Select Country:</label>
                            <select name="country" id="country">
                                <option value="Null"></option>
                                <?php
                                foreach ($countries as $y) {
                                    echo '<option value="' . $y . '">' . $y . '</option>';
                                }
                                ?>

                            </select>
                        </div>
                    </div>

                    <div class="submit">
                        <button class="submit-btn" onclick="scrollDown()">Search For Car</button>
                    </div>
            </form>


        </div>
    </div>

    <div class="output-search">
        <div class="container">
            <div class="search-result" id="search-result"></div>
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
<script>
    const form = document.getElementById("form");
    const resultbox = document.getElementById("search-result")


    form.addEventListener("submit", (e) => {

        while (resultbox.firstChild) {
            resultbox.removeChild(resultbox.lastChild);
        }
        const brand = document.getElementById("Brand");
        const overview = document.getElementById("overview");
        const airbag = document.getElementById("airbag");
        const price = document.getElementById("price");
        const color = document.getElementById("color");
        const seatingcapacity = document.getElementById("seatingcapacity");
        const year = document.getElementById("year");
        const airconditioner = document.getElementById("airconditioner");
        const country = document.getElementById("country");
        const brandname= document.getElementById("brandname");
        e.preventDefault();
        const data = {
            brand: brand.value,
            overview: overview.value,
            airbag: airbag.value,
            price: price.value,
            color: color.value,
            seatingcapacity: seatingcapacity.value,
            year: year.value,
            airconditioner: airconditioner.value,
            country: country.value,
            brandname: brandname.value
        };
        console.log("megzo is 3ars");
        $.ajax({
                type: 'POST',
                url: 'searchprocessing.php',
                data: data,
            })
            .done((data) => {

                if (data === "error") {
                    return false;
                } else {

                    // const para = document.createElement("p");
                    // const node = document.createTextNode(item.a);

                    for (let i = 0; i < data.length; i++) {
                        // let maindiv = document.createElement("div");
                        // let item=data[i];
                        // const imgdiv = document.createElement("div");
                        // imgdiv.classList.add("image");
                        // const para = document.createElement("img");
                        // para.src = "data:image/jpeg;base64," + item.a;
                        // imgdiv.appendChild(para);
                        // maindiv.appendChild(imgdiv);






                        // const para3 = document.createElement("p");
                        // const nodec = document.createTextNode(item.c);
                        // para3.appendChild(nodec);
                        // maindiv.appendChild(para3);



                        // const para4 = document.createElement("p");
                        // const noded = document.createTextNode("Year : " + item.d);
                        // para4.appendChild(noded);
                        // maindiv.appendChild(para4);



                        // const para5 = document.createElement("p");
                        // const nodee = document.createTextNode("Price : $"+ item.e);
                        // para5.appendChild(nodee);
                        // maindiv.appendChild(para5);


                        // const para6 = document.createElement("p");
                        // const nodef = document.createTextNode("Seating Capacity : " + item.f);
                        // para6.appendChild(nodef);
                        // maindiv.appendChild(para6);

                        // const para7 = document.createElement("p");
                        // var nodeg;
                        // if(item.g === 'Y'){
                        //     nodeg = document.createTextNode("Air Conditioner : Yes");
                        // }
                        // else{
                        //     nodeg = document.createTextNode("Air Conditioner : No");
                        // }
                        // para7.appendChild(nodeg);
                        // maindiv.appendChild(para7);

                        // const para8 = document.createElement("p");
                        // var nodeh;
                        // if(item.h === 'Y'){
                        //     nodeh = document.createTextNode("Air Bag : Yes");
                        // }
                        // else{
                        //     nodeh = document.createTextNode("Air Bag : No");
                        // }
                        // para8.appendChild(nodeh);
                        // maindiv.appendChild(para8);

                        // const para9 = document.createElement("p");
                        // const nodei = document.createTextNode("Country : " + item.i);
                        // para9.appendChild(nodei);
                        // maindiv.appendChild(para9);



                        let item = data[i];
                        let maindiv = document.createElement("form");
                        maindiv.action = "reserve.php";
                        maindiv.method = "post";
                        const imgdiv = document.createElement("div");
                        imgdiv.classList.add("image");
                        const img = document.createElement("img");
                        img.src = "data:image/jpeg;base64," + item.a;
                        imgdiv.appendChild(img);
                        maindiv.appendChild(imgdiv);
                        // createInput(maindiv, "plateid", item.plateid);
                        // const para2 = document.createElement("p");
                        // para2.classList.add("c-name");
                        // const nodeb = document.createTextNode(item.b);
                        // para2.appendChild(nodeb);
                        // maindiv.appendChild(para2);


                        createInput(maindiv, "brandName", item.brandName);
                        createInput(maindiv, "a", item.b);
                        createInput(maindiv, "b", item.c);
                        createInput(maindiv, "c", "Year : " + item.d);
                        createInput(maindiv, "d", "Price Per Day : " + item.e);
                        createInput(maindiv, "e", "Seating Capacity : " + item.f);
                        if (item.g === "Y") {
                            createInput(maindiv, "f", "Air Conditioner : Yes");
                        } else {
                            createInput(maindiv, "f", "Air Conditioner : No");
                        }

                        if (item.h === "Y") {
                            createInput(maindiv, "g", "Airbag : Yes");
                        } else {
                            createInput(maindiv, "g", "Airbag : No");
                        }

                        createInput(maindiv, "h", "Country : " + item.i);
                        createInput(maindiv, "plateid", item.plateid);



                        const submitButton = document.createElement("button");
                        submitButton.type = "submit";
                        submitButton.classList.add("submit-btn")
                        submitButton.textContent = "RENT CAR";
                        maindiv.appendChild(submitButton);

                        document.getElementById("search-result").appendChild(maindiv);
                    }
                }





                function createInput(parent, name, value) {

                    const input = document.createElement("input");
                    input.readOnly = true;
                    input.type = "text";
                    input.name = name.toLowerCase();
                    if (name === "a") {
                        input.classList.add("c-name");
                    }
                    if (name === "plateid") {
                        input.classList.add("pid");
                    }
                    if (name === "brandName") {
                        input.classList.add("brandName");
                    }
                    console.log(input.name);
                    input.value = value;
                    parent.appendChild(input);
                }

            })
            .fail((err) => {
                console.error(err);
            })
            .always(() => {
                console.log('always called');
            });
    });
</script>
<script>
    function scrollDown() {
        // You can adjust the scroll amount based on your needs
        window.scrollBy(0, 500); // Scroll down by 100 pixels
    }
</script>

</html>