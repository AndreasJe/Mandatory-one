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



  <div class="form_container">
    <h2 class="text-center">
      <?php echo
      ' Hello ' . $_SESSION['user_name'] . '!'    ?>

    </h2>
    <p class="userinfo">
      <?php echo
      ' Here is your email adress: <bold>' . $_SESSION['user_email'];
      ?></bold> <br><br> <?php echo
                          ' Dont forget your password (this is what i see): <bold>' . $_SESSION['user_password'];
                          ?></bold> <br><br> <?php echo
                                              ' What about that ID?<bold> ' . $_SESSION['user_id'];
                                              ?></bold>
      <br><br>
      If you want to change this information, you can do so by using the user menu in the top right corner.
    </p>
  </div>
</main>





<?php
require_once('components/footer.php');
?>