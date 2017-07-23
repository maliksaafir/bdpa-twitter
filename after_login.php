<?php
  require 'connect.php';

  session_start();
  session_unset($_SESSION['password_incorrect']);

   if (!empty($_POST['username']) && !empty($_POST['password'])) {
     $username = $_POST['username'];
     $password = $_POST['password'];

     $sql = "SELECT password FROM users WHERE username='$username'";

     $result = $conn->query($sql);

     $row = $result->fetch_assoc();

     $hashed_password = $row['password'];

     if ($password == password_verify($password, $hashed_password)) {
       header("Location: feed.php");
     } else {
       $_SESSION['password_incorrect'] = false;
       header("Location: login.php");
     }
   } else {
     header("Location: login.php");
   }
?>
