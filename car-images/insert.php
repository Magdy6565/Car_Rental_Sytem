<?php
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


// SQL statements to insert data into the car table
$sqlStatements = [
    "INSERT INTO car (`PlateId`, `CarName`, `Overview`, `PricePerDay`, `Year`, `Image`, `DriverAirbag`, `Status`, `Color`) VALUES (101, 'Sedan1', 'Comfortable sedan', 50, 2022, '" . $conn->real_escape_string(file_get_contents('sedan_image.jpg')) . "', 'Y', 'Available', 'Blue')",
    "INSERT INTO car (`PlateId`, `CarName`, `Overview`, `PricePerDay`, `Year`, `Image`, `DriverAirbag`, `Status`, `Color`) VALUES (102, 'SUV1', 'Spacious SUV', 70, 2021, '" . $conn->real_escape_string(file_get_contents('suv_image.jpg')) . "', 'Y', 'Reserved', 'Black')",
    "INSERT INTO car (`PlateId`, `CarName`, `Overview`, `PricePerDay`, `Year`, `Image`, `DriverAirbag`, `Status`, `Color`) VALUES (103, 'Sedan2', 'Fuel-efficient sedan', 60, 2020, '" . $conn->real_escape_string(file_get_contents('sedan2_image.jpg')) . "', 'Y', 'Available', 'Silver')",
    "INSERT INTO car (`PlateId`, `CarName`, `Overview`, `PricePerDay`, `Year`, `Image`, `DriverAirbag`, `Status`, `Color`) VALUES (104, 'SUV2', 'Family-friendly SUV', 80, 2022, '" . $conn->real_escape_string(file_get_contents('suv2_image.jpg')) . "', 'Y', 'Reserved', 'Red')",
    "INSERT INTO car (`PlateId`, `CarName`, `Overview`, `PricePerDay`, `Year`, `Image`, `DriverAirbag`, `Status`, `Color`) VALUES (105, 'Compact1', 'Compact car for city driving', 45, 2021, '" . $conn->real_escape_string(file_get_contents('compact_image.jpg')) . "', 'N', 'Available', 'White')",
    "INSERT INTO car (`PlateId`, `CarName`, `Overview`, `PricePerDay`, `Year`, `Image`, `DriverAirbag`, `Status`, `Color`) VALUES (106, 'Sedan1', 'Another Sedan for testing', 55, 2023, '" . $conn->real_escape_string(file_get_contents('sedan3_image.jpg')) . "', 'Y', 'Available', 'Black')",
    "INSERT INTO car (`PlateId`, `CarName`, `Overview`, `PricePerDay`, `Year`, `Image`, `DriverAirbag`, `Status`, `Color`) VALUES (107, 'SUV1', 'Another SUV for testing', 75, 2020, '" . $conn->real_escape_string(file_get_contents('suv3_image.jpg')) . "', 'Y', 'Reserved', 'Green')",
    // ... Add more SQL statements here
];

// Loop through SQL statements
foreach ($sqlStatements as $sql) {
    // Execute the SQL statement
    if ($conn->query($sql) === TRUE) {
        echo "Data inserted successfully<br>";
    } else {
        echo "Error inserting data: " . $conn->error . "<br>";
    }
}

// Close the database connection
$conn->close();
?>
