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

    </ul>
  </div>

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
    If you want to change this information, you can do so, by using the form below
  </p>


  <div class="form_container">

    <h4>Change user information</h4>

    <form id="form_update_user" onsubmit="return false">
      <label for="password">Password</label>
      <input type="text" name="password" placeholder="<?php echo $_SESSION['user_password'] ?> "><br>
      <label for="email">Email</label>
      <input type="text" name="email" placeholder="<?php echo $_SESSION['user_email'] ?> "><br>

      <button onclick="update()">Update</button>

      <em>Click the button to confirm the change</em>
    </form>
  </div>





</main>

<script>
  async function update() {
    let conn = await fetch("apis/api-update-user.php", {
      method: "POST",
      body: new FormData(document.querySelector("#form_update_user"))
    })
    let response = await conn.json()
    console.log(response)
  }
</script>




<?php
require_once('components/footer.php');
?>