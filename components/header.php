<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $_title ?? 'COMPANY' ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="validator.js"></script>
    <link rel="stylesheet" href="../styledapp.css">
</head>

<header>

    <nav class="navbar navbar-light navbar-expand-sm">
        <a class="navbar-brand" href="user.php">
            <img class="logo" src="logo.svg" width="30" height="30" alt="logo">

        </a>
        <ul class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                data-bs-toggle="dropdown" aria-expanded="false">
                Products
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <li><a class="dropdown-item" href="upload-item.php">Upload Product</a></li>
                <li><a class="dropdown-item " href="items.php">View Products</a></li>
            </ul>
        </ul>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-list-4"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="user-nav">
            <ul class="navbar-nav">

                <li id="nav-username" class="nav-item">
                    <a class="capital nav-link disabled" href="#" tabindex="-1"
                        aria-disabled="true"><?php echo
                                                                                                        $_SESSION['user_name']    ?></a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                        <?php if (isset($_SESSION['user_name'])) { ?>
                        <img class="user_img rounded-circle" src="uploads/profilepics/img_<?= $_SESSION['user_id'] ?>"
                            width="40" height="40">
                        <?php } else { ?>
                        <img class="user_img" src="uploads/profilepics/user-img.svg" width="40" height="40"
                            class="rounded-circle">
                        <?php } ?>


                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="user.php">Dashboard</a>
                        <a class="dropdown-item" href="update-user.php">Change Password</a>
                        <a class="dropdown-item" href="logout.php">Log Out</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>


</header>

<body>