<?php
$_title = 'Login';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $_title ?? 'COMPANY' ?></title>
  <link rel="stylesheet" href="../styled_app.css">
  <script src="validator.js"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>

<body>
  <main>

    <div class="row full-height justify-content-center">
      <div class="col-12 text-center align-self-center py-5">
        <div class="section pb-5 pt-5 pt-sm-2 text-center">
          <div class="form_container">

            <form action="apis/api-login.php" onsubmit="return false">
              <input name="email" type="text" placeholder="Email"><br>
              <input name="password" type="password" placeholder="Password"><br>

              <button class="button" onclick="login()">Login</button>

            </form>
          </div>
          <div class="container info">
            <em>Don't have an account? Sign up</em> <a href="signup">here!</a>
          </div>
        </div>
      </div>
    </div>
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