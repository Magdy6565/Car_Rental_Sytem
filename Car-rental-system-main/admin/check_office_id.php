<?php


// echo "iam checking if office id found in db" ;
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
if (isset($_POST['officeId'])) {
    $officeId = $_POST['officeId'];

    $sql = "SELECT   OId FROM offices";
    $result = $conn->query($sql);

    if (isset($result)) {
        if ($result->num_rows > 0) {
            // Output the car information in a box
            while ($row = $result->fetch_assoc()){

                if($row['OId'] === $officeId){
                    echo "not_unique";
                }

            }
            echo "unique" ;
        
        }
        
        
        
        }
    }

?>
