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



  // Does the user exist or not (If it does continue )
  if (!empty($row)) {
    // Verify password input string with hashed password in database row.
    if (password_verify($_POST['password'], $row['user_password'])) {

      http_response_code(200);
      echo "SUCCESS: Password is valid";
      //Start SESSION and assign values from database
      session_start();
      $_SESSION['user_verified'] = $row['verified'];
      $_SESSION['user_email'] = $row['user_email'];
      $_SESSION['user_password'] = $row['user_password'];
      $_SESSION['user_name'] = $row['user_name'];
      $_SESSION['user_id'] = $row['user_id'];
    } else {
      echo "ERROR: Password is invalid";
    }
    // If $row is empty, the user doesn't exist.
  } else {
    echo "ERROR: User does not exist";
    exit();
  }
} catch (Exception $ex) {
  _res(500, ['info' => 'system under maintainance', 'error' => __LINE__]);
  echo "Speak to an adult";
}
