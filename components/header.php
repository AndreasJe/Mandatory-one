<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $_title ?? 'COMPANY' ?></title>
  <link rel="stylesheet" href="../app.css">
  <script src="../validator.js"></script>
</head>


<nav>
  <div class="left">
    <a href="user.php">Home</a>
  </div>

  <div class="center">
    <h1><?= $_title ?? 'COMPANY' ?></h1>
  </div>

  <div class="right">

    <?php if (isset($_SESSION['user_name'])) { ?> <a href="logout.php">Logout</a>
    <?php }
    if (!isset($_SESSION['user_name'])) {
    } ?>


  </div>

  </div>

</nav>


<body>