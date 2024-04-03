<?php
$conn = mysqli_connect("localhost", "root", "", "car_rental_system");
if (!$conn) {
  echo "<script>alert('Connection failed.');</script>";
}
?>