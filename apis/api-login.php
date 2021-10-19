
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
    $row = $q->fetch(PDO::FETCH_ASSOC);

    if (!empty($row)) { // Does the user exist or not (If it does continue )
      if (password_verify($_POST['password'], $row['user_password'])) { // Verify password input string, with hashed password in database row.
        _res(200, ['info' => 'success login']);
      } else { // If they dont match, we have this error, which i will use for user feedback.
        $error = "Password is not valid";
      }
    } else { // If $row is empty, the user doesn't exist.
      $error = "This user does not exist";
    }

    // Success
    session_start();
    $_SESSION['user_email'] = $row['user_email'];
    $_SESSION['user_password'] = $row['user_password'];
    $_SESSION['user_name'] = $row['user_name'];
    $_SESSION['user_id'] = $row['user_id'];
  } catch (Exception $ex) {
    _res(500, ['info' => 'system under maintainance', 'error' => __LINE__]);
    $error = "Speak to an adult";
  }
