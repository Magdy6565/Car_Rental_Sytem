<?php
  session_start();
  if (isset($_SESSION["SESSION_EMAIL"])) {
      header("Location: profile.php");
  }
  if(isset($_POST["login"])){
    include 'config.php';
    $email = $_POST["email"];
    $password = md5($_POST["password"]);
    //check if the email and password exists
    if (mysqli_num_rows(mysqli_query($conn,"SELECT * FROM users WHERE email='{$email}' AND password='{$password}'")) === 1) {
      $_SESSION["SESSION_EMAIL"] = $email;
      $sql="SELECT admin FROM users WHERE email='{$email}' AND password='{$password}'";
      $result = $conn->query($sql);
      $row = $result->fetch_assoc();
      if($row["admin"] === "1"){
        echo "successadmin";
      }
      else{
        echo "success";
      }

    }else {
      //check either email or password is incorrect
      if (mysqli_num_rows(mysqli_query($conn,"SELECT * FROM users WHERE email='{$email}'")) === 1){
        echo "invalidPassword";
      }else {
        echo "invalidEmail";
      }
    }
  }
?>
