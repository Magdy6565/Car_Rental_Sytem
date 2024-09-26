<?php
// Assuming your form sends data to this file

// Function to sanitize user input
function sanitizeInput($input) {
    // You should customize this based on your specific needs
    return htmlspecialchars(trim($input));
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve and sanitize user input
    $fname = sanitizeInput($_POST["fname"]);
    $lname = sanitizeInput($_POST["lname"]);
    $email = sanitizeInput($_POST["email"]);
    $password = password_hash(sanitizeInput($_POST["password"]), PASSWORD_DEFAULT); // Hash the password
    $ssn = sanitizeInput($_POST["ssn"]);
    $dob = sanitizeInput($_POST["dob"]);
    $address = sanitizeInput($_POST["address"]);
    $contactNumber = sanitizeInput($_POST["contact_number"]);
    $city = sanitizeInput($_POST["city"]);
    $country = sanitizeInput($_POST["country"]);

   

    // Establish a connection to your MySQL database
    $dbHost = "localhost";
    $dbUser = "root";
    $dbPassword = "";
    $dbName = "car_rental_system";

    $conn = new mysqli($dbHost, $dbUser, $dbPassword, $dbName);

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // SQL query to insert data into the customer table
    $sql = "INSERT INTO users (fname, lname, email, password, city, country, address, dob, contactNumber)
     VALUES ('$fname', '$lname', '$email','$password', '$city', '$country', '$address', '$dob', '$contactNumber' )";

    // Prepare the statement
    $stmt = $conn->prepare($sql);

    // Bind parameters
    // $stmt->bind_param("ssssss", $fname, $lname, $email, $password, $city, $country);

    
    // Execute the statement
    if ($stmt->execute()) {
        echo "Registration successful!";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
} else {
    // Handle the case where the form wasn't submitted properly
    echo "Form not submitted.";
}
?>
