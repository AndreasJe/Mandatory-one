<?php
$_title = 'Signup';
require_once('components/header.php');
?>

<nav>
  <a href="login.php">Login</a>
  <a href="user.php">Home</a>
</nav>
<h1>Give me your information</h1>
<form id="form_sign_up" onsubmit="return false">
  <input name="name" type="text" placeholder="name">
  <input name="last_name" type="text" placeholder="last name">
  <input name="email" required="required" type="text" placeholder="email">
  <input name="password" type="text" placeholder="password">
  <button onclick="sign_up()">Signup</button>
</form>
<h2 id="feedback"></h2>

<script>
  async function sign_up() {
    let conn = await fetch("api-signup.php", {
      method: "POST",
      body: new FormData(document.querySelector("#form_sign_up"))
    })
    let response = await conn.json()
    console.log(response)
    console.log("<?php echo $error; ?>")
    document.getElementById("feedback").innerHTML = error_mes;
  }
</script>




<?php
require_once('components/footer.php');
?>