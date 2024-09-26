<?php
include "config.php";

$price  = $_POST['priceperday'] ; 
$plateid=$_POST["plateid"];
$ssn  = $_POST['ssn'] ; 
$start_date = $_POST['start-date']; 
$end_date = $_POST['end-date']; 
$cardNumber = str_replace(' ', '', $_POST['cardNum']);
echo $plateid ; 
echo "\n" ;
echo  $ssn ; 
echo "\n" ;

echo $start_date ; 
echo "\n" ;

echo $end_date ;
echo "\n" ;

$date1 = strtotime($start_date);
$date2 = strtotime($end_date);
$daysDifference = floor(($date2 - $date1) / (60 * 60 * 24));

echo "\n" ;

echo $daysDifference ;
echo "\n" ;

echo intval($price) ;
$totalprice = $daysDifference * intval($price);
echo "\n" ;

echo $totalprice ;
$patterns = [
    'Visa'       => '/^4[0-9]{12}(?:[0-9]{3})?$/',
    'MasterCard' => '/^5[1-5][0-9]{14}$/',
    'Discover'   => '/^6(?:011|5[0-9]{2})[0-9]{12}$/',
];
$pay = "unknown" ;
foreach ($patterns as $provider => $pattern) {
    if (preg_match($pattern, $cardNumber) == 1) {
        echo "<br> done";
        $pay = $provider;
        break;
    }
}    
echo "<br>" . $pay ;
    
    $sql2 = "INSERT  INTO `reservation` ( `SSN` , `PlateId` , `pickup_date` ,
    `return_date` , `Payment_method` , `Total_price`) 
    VALUES ('$ssn','$plateid','$start_date','$end_date' , '$pay', '$totalprice') 
    " ; 
    $rs = mysqli_query($conn, $sql2);

    if ($rs) {
        echo "success";
    } else {
        echo "error ya 7amada ";
    }
    
    header("Location: profile.php");
?>