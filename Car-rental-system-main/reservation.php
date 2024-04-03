<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "car_rental_system";

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Your SQL query
$sql = "SELECT * FROM Car where status = 'Available'";

// Perform the query
$result = $conn->query($sql);

// Check if the query was successful
if ($result) {
    $rowCount = $result->num_rows;

    // Output the number of rows
    echo "Number of rows: $rowCount";
    // Loop through the rows
    while ($row = $result->fetch_assoc()) {
        // echo '<img src="' . "./car-images/" . $row["Image"] . '" alt="Car Image"><br>';
        echo '<img src="data:image/jpeg;base64,'.base64_encode($row["Image"]).'" ><br>';
        // Echo each row or process it as needed
        echo "name: " . $row["CarName"] . " - overview: " . $row["Overview"] . "<br>";
    }
} else {
    // Handle the query error
    echo "Error: " . $conn->error;
}
// if ($result) {
//     // Fetch the first row
//     if ($row = $result->fetch_assoc()) {
//         // echo '<img src="' . $row["image"] . '" alt="Car Image"><br>';
//         // Echo each row or process it as needed
//         echo '<img src="' . $row["Image"] . '" alt="Car Image"><br>';
//         echo "name: " . $row["CarName"] . " - overview: " . $row["Overview"] . "<br>";
//     } else {
//         // Handle the case where no rows were found
//         echo "No available cars found.";
//     }
// } else {
//     // Handle the query error
//     echo "Error: " . $conn->error;
// }

// Close the connection
$conn->close();
?>
