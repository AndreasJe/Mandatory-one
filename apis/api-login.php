<?php

require_once('globals.php');

try {
  $db = _db();
} catch (Exception $ex) {
  _res(500, ['info' => 'system under maintainance', 'error' => __LINE__]);
}


try {
  $q = $db->prepare('SELECT * FROM users WHERE user_email = :user_email');
  $q->bindValue(':user_email', $_POST['email']);
  $q->execute();
  $row = $q->fetch();
  if (!$row) {
    _res(400, ['info' => 'wrong credentials', 'error' => __LINE__]);
  }

  // Success
  session_start();
  $_SESSION['user_email'] = $row['user_email'];
  $_SESSION['user_password'] = $row['user_password'];
  $_SESSION['user_name'] = $row['user_name'];
  $_SESSION['user_id'] = $row['user_id'];
  _res(200, ['info' => 'success login']);
} catch (Exception $ex) {
  _res(500, ['info' => 'system under maintainance', 'error' => __LINE__]);
}
