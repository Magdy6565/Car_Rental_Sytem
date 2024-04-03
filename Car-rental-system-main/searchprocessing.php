<?php 
/********* */
//trying to search the car by the specs the admin entered 
//even if the admin didnot enter all the specs i will search with the entered specs
include "config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $color = isset($_POST["color"]) ? $_POST["color"] : null;
    $brand = isset($_POST["brand"]) ? $_POST["brand"] : null;
    $airbag = isset($_POST['airbag']) ? $_POST['airbag'] : null;
    $airconditioner = isset($_POST['airconditioner']) ? $_POST['airconditioner'] : null;
    $price =  isset($_POST["price"]) ? $_POST["price"] : null;
    $overview =  isset($_POST["overview"]) ? $_POST["overview"] : null;
    $seatingcapacity =  isset($_POST["seatingcapacity"]) ? $_POST["seatingcapacity"] : null;
    $year =  isset($_POST["year"]) ? $_POST["year"] : null;
    $country =  isset($_POST["country"]) ? $_POST["country"] : null;
    $brandname = isset($_POST["brandname"]) ? $_POST["brandname"] : null;

    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
// echo($plate_id);
$sql = "
SELECT * 
FROM car  as c
JOIN offices AS o 
ON c.OId =  o.OId 
WHERE Status ='Available' ";

if($brandname !== "Null"){
    $sql .= " AND brandName = '$brandname'";

}

if ($country !== "Null") {
    $sql .= "  AND Country = '$country' ";

}
if ($color !== "Null") {
    $sql .= " AND Color = '$color'";
}


if (!empty($brand)) {
    $sql .= " AND CarName = '$brand'";
}

if ( $airbag !== "Null") {
    $sql .= " AND DriverAirbag = '$airbag'";
}
if (!empty($price) ) {
    $sql .= " AND PricePerDay <= '$price'";
}
if ( $overview !== "Null") {
    $sql .= " AND Overview = '$overview'";
}
if ($seatingcapacity !== "Null") {
    $sql .= " AND Seating_capacity = '$seatingcapacity'";
}
if ($year !== "Null") {
    $sql .= " AND Year = '$year'";
}
if ($airconditioner !== "Null") {
    $sql .= " AND Air_conditioner = '$airconditioner'";
}
// echo $sql;
// echo $sql ;
$result = $conn->query($sql);

$data = array(); // Initialize an array to store results
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        // Sample array for each row
        $rowData = array("a" => base64_encode($row["Image"]), "b" => $row["CarName"], "c" => $row["Overview"], "d"=> $row["Year"],
        "e"=> $row["PricePerDay"], "f"=>$row["Seating_capacity"], "g"=> $row["Air_conditioner"] , "h" => $row["DriverAirbag"] , "i" => $row['Country']
    ,"plateid" => $row["PlateId"], "brandName" => $row["brandName"]);
    
        $data[] = $rowData; // Add the row data to the main array
    }
    
    header("Content-Type: application/json");
    echo json_encode($data);
    }
}
else{
    echo "error";
}


?>