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
    while ($row = $results->fetch_object) {
      echo <<<TWEET
        <h2>$row->user</h2>
        <p>$row->words</p>
        <span>$row->time</span>
TWEET;
    }
  }
?>
