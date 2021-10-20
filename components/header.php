<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $_title ?? 'COMPANY' ?></title>
  <link rel="stylesheet" href="../styled_app.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="validator.js"></script>
</head>

<header>

  <nav class="navbar navbar-light navbar-expand-sm">
    <a class="navbar-brand" href="user.php">
      <img src="logo.svg" width="30" height="30" alt="logo">
      AmazonBay
    </a>
    <a class="nav-link" href="upload-item.php">
      Upload Products
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-list-4" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="user-nav">
      <ul class="navbar-nav">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <img src="../user.png" width="40" height="40" class="rounded-circle">
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="user.php">Dashboard</a>
            <a class="dropdown-item" href="update-user.php">Edit Profile</a>
            <a class="dropdown-item" href="logout.php">Log Out</a>
          </div>
        </li>
      </ul>
    </div>
  </nav>


</header>

<body>