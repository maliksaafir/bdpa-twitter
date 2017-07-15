<html>
<head>
  <title>Username's Profile</title>
  <link rel="stylesheet" type="text/css" href="styling.css">
  <style>
  #header-img {
    background: lightblue;
    width:100%;
    height: 200px;
  }

  #userStats {
    border-bottom: 5px;
    height: 50px;
    /*background: green;*/
  }

  .floatLeft {
    float: left;
    padding: 20px;
  }

  #tweets {
    text-align: center;
  }
  </style>
</head>
<body>
  <?php require "header.php" ?>
  <div id="header-img">Big Header Image</div>
  <div id="userStats">
    <div class="floatLeft">This Many Followers</div>
    <div class="floatLeft">This Many Following</div>
    <div class="floatLeft">This Many Tweets</div>
  </div>
  <br>
  <hr></hr>
  <div id="tweets">Tweets go here.</div>
</body>
</html>
