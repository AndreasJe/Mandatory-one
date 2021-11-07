<?php
$_title = 'Signup';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $_title ?? 'COMPANY' ?></title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <link rel="stylesheet" href="../styledapp.css">
  <script src="validator.js"></script>
  <style>
    body {
      background: url(bg.jpg) center center no-repeat;
      background-size: cover;
      width: 100vw;
      height: 100vh;
      position: relative;
    }
  </style>
</head>

<body>
  <main>

    <div class="row full-height justify-content-center">
      <div class="col-12 text-center align-self-center py-5">
        <div class="section pb-5 pt-5 pt-sm-2 text-center">

          <div class="form_container">
            <form id="form_sign_up" onsubmit="return false">
              <input name="name" required="required" type="text" placeholder="name"><br>
              <input name="email" required="required" type="text" placeholder="email"><br>
              <input name="password" required="required" type="text" placeholder="password"><br>

              <div class=" d-flex justify-content-evenly">

                <a class="button" href="login.php">Go Back</a>
                <button type="submit" onclick="sign_up()">Signup</button>
              </div>
            </form>
          </div>
          <div class="mt-5" id="feedback">
            <em id="respons"></em>
          </div>
        </div>
      </div>
    </div>
    </div>
  </main>
  <script>
    async function sign_up() {
      let conn = await fetch("apis/api-signup.php", {
        method: "POST",
        body: new FormData(document.querySelector("#form_sign_up"))
      })
      let response = await conn.json()
      console.log(response)
      if (conn.ok) {
        _one("#respons").innerHTML = " "
        _one("#respons").innerHTML = JSON.stringify(response)
        _one("#respons").innerHTML = JSON.stringify(response2)
      }
    }
  </script>

  <?php
  require_once('components/footer.php');
  ?>