<?php
$_title = 'Signup';
require_once('components/header.php');
?>

<main>
  <h2>Give me your information</h2>
  <div class="form_container">
    <form id="form_sign_up" onsubmit="return false">
      <input name="name" type="text" placeholder="name"><br>
      <input name="last_name" type="text" placeholder="last name"><br>
      <input name="email" required="required" type="text" placeholder="email"><br>
      <input name="password" type="text" placeholder="password"><br>
      <button onclick="sign_up()">Signup</button>
    </form>
  </div>
  <h2 id="feedback"></h2>

</main>
<script>
  async function sign_up() {
    let conn = await fetch("apis/api-signup.php", {
      method: "POST",
      body: new FormData(document.querySelector("#form_sign_up"))
    })
    let response = await conn.json()
    console.log(response)
  }
</script>




<?php
require_once('components/footer.php');
?>