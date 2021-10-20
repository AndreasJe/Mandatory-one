<?php
$_title = 'Login';
require_once('components/header.php');
?>


<main>
  <div class="info">
    <em>Enter your account details or sign up</em> <a href="signup">here!</a>
  </div>
  <form action="apis/api-login.php" onsubmit="return false">
    <input name="email" type="text" placeholder="email"><br>
    <input name="password" type="password" placeholder="password"><br>
    <button onclick="login()">Login</button>
  </form>

  <div id="feedback">

  </div>
</main>
<script>
  async function login() {
    const form = event.target.form
    console.log(form)
    let conn = await fetch("apis/api-login", {
      method: "POST",
      body: new FormData(form)
    })

    if (conn.ok) {
      location.href = "user.php"



    }
  }
</script>

<?php
require_once('components/footer.php');
?>