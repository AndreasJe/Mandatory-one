<?php
session_start();
if (!isset($_SESSION['user_name'])) {
  header('Location: login');
  exit();
}
?>

<?php
$_title = 'Homepage';
require_once('components/header.php');
?>

<main>



  <h2>
    <?php echo
    ' Hello ' . $_SESSION['user_name'] . '!'    ?>

  </h2>

  <p class="userinfo">
    <?php echo
    ' Here is your email adress: ' . $_SESSION['user_email'];
    ?> <br> <?php echo
            ' Dont forget your password: ' . $_SESSION['user_password'];
            ?> <br> <?php echo
                    ' What about that ID? ' . $_SESSION['user_id'];
                    ?>
    <br><br>
    If you want to change this information, you can do so, by using the link below
  </p>


  <div class="options">
    <ul>
      <li>
        <a href="logout"> Logout</a>
      </li>
      <li>
        <a href="signup.php">Signup</a>
      </li>
      <li>
        <a href="upload-item.php">Upload items</a>
      </li>
      <li>
        <a href="update-user.php">Update user</a>
      </li>


    </ul>
  </div>
</main>





<?php
require_once('components/footer.php');
?>