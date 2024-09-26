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

    $start = $_POST['start'];
    $end = $_POST['end'];
    $plateid = $_POST['plateid'] ;

    $sql = "
    SELECT * 
    FROM reservation 
    WHERE PlateId = '$plateid' AND 
    (pickup_date BETWEEN '$start' AND '$end'    OR  '$start' BETWEEN pickup_date AND return_date )
    ";
    // $sql = "
    // SELECT * 
    // FROM reservation 
    // WHERE PlateId = '$plateid' AND 
    // ( (STR_TO_DATE('$start', '%Y-%m-%d') BETWEEN pickup_date AND return_date) OR
    //  (STR_TO_DATE('$end', '%Y-%m-%d') BETWEEN pickup_date AND return_date) )
    // ";
    // $sql = "
    // SELECT * 
    // FROM reservation 
    // WHERE PlateId = '$plateid' AND 
    // ( (STR_TO_DATE('$start', '%Y-%m-%d') BETWEEN pickup_date AND return_date) OR
    //  (pickup_date BETWEEN (STR_TO_DATE('$start', '%Y-%m-%d') AND (STR_TO_DATE('$end', '%Y-%m-%d') )
    // ";

    $result = $conn->query($sql);

   
        if ($result->num_rows == 0 ) {
            // Output the car information in a box
            echo "noclash" ;


            }
            else{

                echo "siu" ;
                echo $result->num_rows ; 
                 $row = $result->fetch_assoc() ;
                 echo $row['SSN'] ;

        }

        
       
        
        
        
        

?>
