<html>
<head>
  <title>User Profile</title>
  <link rel="stylesheet" type="text/css" href="styling.css">
  <style>
  #header-img {
    background: lightblue;
    width:100%;
    height: 200px;
    float: right;
    display: flex;
    padding: 50px;
  }

  #userStats {
    border: 5px;
    height: 75px;
    width: 300px
    padding: 10px;
    position: static;
    margin-top: 50px;
    /*background: green;*/
  }

  .floatLeft {
    float: left;
    padding: 20px;
  }
  .floatcenter {
    float: center;
    padding: 20px;
  }
  .floatright{
    float: right;
    padding: 20px;
  }
  #tweets {
    text-align: center;
    display: flex;
    flex-direction: row;
    flex-grow: 1;
    flex-wrap: wrap;

  }
  </style>
</head>
<body>
  <?php require "header.php" ?>


  <div id="header-img">Big Header Image</div>

  <br></br>
  <hr></hr>
  <br></br>
  <div id="userStats">
      <table>
        <tr>
          <th>Followers</th>
          <th>Following</th>
          <th>Tweets</th>
        </tr>
        <tr>
          <td name="followersid">#</td>
          <td name="followingid">#</td>
          <td name="tweetsid">#</td>
        </tr>
        <tr>
          <td width="100px"><button type="button" class="btn btn-primary" name="followers">Followers List</button></td>
          <td width="100px"><button type="button" class="btn btn-primary"name="following">Following List</button></td>
          <td width="100px"><button type="button" class="btn btn-primary" name="tweets">Tweets List</button></td>
        <tr>
      <table>
    </div>
  <br>
  <hr></hr>
  <div id="tweets">
    <input max="30" class="textbox" name="tweets" placeholder="Tweets go here."/>
    <button type="button" class="btn btn-primary">Post</button>

  </div>

</body>
</html>
