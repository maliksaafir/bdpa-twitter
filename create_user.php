<!--Creating user-->
<?php
  $username = $_REQUEST['(put in the username thing here)'];
  $password = password_hash($_POST['(grab password here)'], PASSWORD_DEFAULT);

  $sql = "INSERT INTO username, password FROM users VALUES ($username, $password)";

  $result = $conn->query($sql);

  Location("header: this will be the page for the users to follow.");
?>

<!--Verify user-->
<?php
  $username = $_REQUEST['(put in the username thing here)'];
  $password = $_POST['(grab password here)'];

  $sql = "SELECT password WHERE '$username' IN username";

  $result = $conn->query($sql);

  $hashed_password = $conn->result(fetch_assoc());

  if ($password == password_verify($password, $hashed_password)) {
    Location("header: This will be the feed page.");
  } else {
    echo "<script>alert('Incorrect username and/or password.')</script>";
  }
?>

<?php
  $search_query = $_REQUEST['search'];

  $sql = "SELECT * username FROM users WHERE username='$search_query'";

  $result = $conn->query($sql);

  $row = $conn->result(fetch_assoc());

  foreach ($row as $value) {
    echo "$value";
  }
 ?>
