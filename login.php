<?php
   ob_start();
   session_start();

   //Checks to see if password was previously entered incorrectly.
   if (isset($_SESSION['password_incorrect']) && !$_SESSION['password_incorrect']) {
     echo "<script>
            alert('Incorrect password.');
          </script>";
   } else {

   }
?>

<html lang = "en">

   <head>
      <title>Login Page</title>
      <link href = "/web-assets/css/bootstrap.min.css" rel = "stylesheet">
    <body>
  <div class = navbar navbar-default >
    <a href="#">Home</a>
    <a href="#">Profile</a>
    <a href="#">Messages</a>
    <form style="float: right">
      <input type="text" placeholder="Search Users">
    </form>
  </div>
  </head>

   <body>

      <h2>Login:</h2>
      <div class = "form-group">

      </div>

      <div class = "container">

         <form class = "form-signin"
            action = "after_login.php" method = "post">
            <input type = "text" class = "form-control"
               name = "username" placeholder = "username"
               required autofocus></br>
            <input type = "password" class = "form-control"
               name = "password" placeholder = "password" required>
             </br>
            <button class = "btn btn-lg btn-primary btn-block" type = "submit"
               name = "login">Login</button>
             </br>
            <label class="checkbox-inline">
                <input type="checkbox" id="session_start" value="session_start"> Remember Me
            </label>
         </form>

         <p>Click here to  <a href = "/reset.php" tite = "Logout">Reset your password.</a></p>

      </div>

     </body>
</html>
