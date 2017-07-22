<?php
  require_once('connect.php');

  function connection_exists(int $user1, int $user2, mysqli $connection) {
    $sql = <<<SQL
    SELECT * FROM connections
    WHERE
      follower = $user1
    AND
      followed = $user2
SQL;

    if ($result = $connection->query($sql)) {
      if ($row = $result->fetch_object()) {
        return 1;
      } else {
        return 0;
      }
    }
  }

  function block_exists(int $user1, int $user2, mysqli $connection) {
    $sql = <<<SQL
      SELECT * FROM blocks
      WHERE
        blocker = $user1
      AND
        blocked = $user2
SQL;

    if ($result = $connection->query($sql)) {
      if ($row = $result->fetch_object()) {
        return 1;
      } else {
        return 0;
      }
    }
  }

  function follow(int $user1, int $user2, mysqli $connection) {
    if ($user1 == $user2) {
      return 0;
    }

    if (connection_exists($user1, $user2, $connection)) {
      return 0;
    }

    $sql = <<<SQL
      INSERT INTO connections
      (follower, followed)
      VALUES
      ($user1, $user2)
SQL;

    if ($connection->query($sql)) {
      return 1;
    } else {
      return 0;
    }
  }

  function unfollow(int $user1, int $user2, mysqli $connection) {
    if ($user1 == $user2) {
      return 0;
    }

    if (!connection_exists($user1, $user2, $connection)) {
      return 0;
    }

    $sql = <<<SQL
      DELETE FROM connections
      WHERE
        follower = $user1
      AND
        followed = $user2
SQL;
    if ($connection->query($sql)) {
      return 1;
    } else {
      return 0;
    }
  }

  function block(int $user1, int $user2, $connection) {
    if ($user1 == $user2) {
      return 0;
    }

    if (block_exists($user1, $user2, $connection)) {
      return 0;
    }

    $block_sql = <<<SQL
      INSERT INTO blocks
        (blocker, blocked)
      VALUES
        ($user1, $user2)
SQL;

    if (connection_exists($user1, $user2, $connection)) {
      unfollow($user1, $user2, $connection);
    }

    if ($connection->query($block_sql)) {
      return 1;
    } else {
      return 0;
    }
  }

  function unblock($user1, $user2, $connection) {
    if ($user1 == $user2) {
      return 0;
    }

    if (!block_exists($user1, $user2, $connection)) {
      return 0;
    }
  }
?>
