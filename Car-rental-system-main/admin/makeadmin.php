<?php
header('Location: customeradvancesearch.php');
// echo 'Iam in insert car to db ' ;
$con = mysqli_connect('localhost', 'root', '', 'car_rental_system');

// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}

$ssn = $_POST['ssn'] ; 




$sql = "
UPDATE users 
SET admin = 1
WHERE SSN = '$ssn' ";

$rs = mysqli_query($con, $sql);

if ($rs) {
    echo "success";
} else {
    echo "error";
}

mysqli_close($con);
?>
