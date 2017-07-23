<div class="container">
<?php
  require_once('header.php');

  $tweets_sql = <<<SQL
    SELECT
      words,
      time,
      user
    FROM
      tweets
SQL;

  if ($results = $conn->query($tweets_sql)) {
    while ($row = $results->fetch_object()) {
      $username_sql = <<<SQL
        SELECT
          username
        FROM
          users
        WHERE
          id = $row->user
SQL;

      $result = $conn->query($username_sql)->fetch_object();
      $username = $result->username; ?>

      <div style="border: 1px solid black">
        <span style="float: right;"><?php echo $username; ?></span>
        <p><?php echo $row->words; ?></p>
        <span><?php echo $row->time; ?></span>
      </div>
<?php
    }
  }
?>
</div>
