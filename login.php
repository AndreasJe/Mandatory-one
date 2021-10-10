<?php
$_title = 'Login';
require_once('components/header.php');
?>


<main>
  <em>Enter your account details</em>
  <form onsubmit="return false">
    <input name="email" type="text" placeholder="email"><br>
    <input name="password" type="password" placeholder="password"><br>
    <button onclick="login()">Login</button>
  </form>

</main>
<script>
  async function login() {
    const form = event.target.form
    console.log(form)
    let conn = await fetch("apis/api-login", {
      method: "POST",
      body: new FormData(form)
    })

    let res = await conn.json()
    console.log(res)
    if (conn.ok) {
      location.href = "user"
    }
  }
</script>

<?php
require_once('components/footer.php');
?>