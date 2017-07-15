<?php
  $conn = new mysqli('localhost', 'root', '', 'bdpa-twitter');
  if ($conn->error) {
    echo "An error has occurred: " . $conn->error;
  }
?>
