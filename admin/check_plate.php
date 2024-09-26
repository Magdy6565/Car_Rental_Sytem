<?php
// Replace the following logic with your actual logic to check the uniqueness of plate_id
$host = "localhost";
$username = "root";
$password = "";
$database = "car_rental_system";

// Create a database connection
$conn = new mysqli($host, $username, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if (isset($_POST['plate_id'])) {
    $plateId = $_POST['plate_id'];

    $sql = "SELECT DISTINCT PlateId FROM car";
    $result = $conn->query($sql);

    if (isset($result)) {
        if ($result->num_rows > 0) {
            // Output the car information in a box
            while ($row = $result->fetch_assoc()){

                if($row['PlateId'] === $plateId){
                    echo "not_unique";
                }

            }
            echo "unique" ;
        
        }
        
        
        
        }
    }

?>
