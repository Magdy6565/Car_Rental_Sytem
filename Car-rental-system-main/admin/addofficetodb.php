<?php
header('Location: temp.php');
$con = mysqli_connect('localhost', 'root', '', 'car_rental_system');

// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}

$officeid = $_POST['ofid'] ; 
$country = $_POST['country'] ; 

$sql = "INSERT INTO `offices` (`OId` , `Country`) VALUES 
('$officeid', '$country')";

$rs = mysqli_query($con, $sql);

if ($rs) {
    echo "success";
} else {
    echo "error ya 7amada ";
}

mysqli_close($con);
?>
