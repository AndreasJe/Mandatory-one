<?php
$_title = 'Reset password';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $_title ?? 'COMPANY' ?></title>
    <script src="validator.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="../styledapp.css">
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


<main>
    <div class="form_container">
        <div class="form_title">
            <h2>Change password</h2>
        </div>


        <form id="form_update_user" onsubmit="return false">
            <input type="password" name="new_password" placeholder="New password ">
            <input type="password" name="confirm_password" placeholder="Confirm password">

            <div class=" d-flex justify-content-evenly">

                <a class="button" href="login.php">Go Back</a>
                <button onclick="update()" name="user_dlt">Update</button>

            </div>
        </form>
        <div id="feedback" class="container info">
            <em class="text-center">Click the button to confirm the change</em>
        </div>
    </div>

</main>



<script>
let key = "<?php echo $_GET['key']; ?>";

async function update() {
    const form = event.target.form
    console.log(form)
    let conn = await fetch("apis/api-new-password.php?key=<?= $_GET['key']; ?> ", {
        method: "POST",
        body: new FormData(form)
    })



    let res = await conn
    if (conn.ok) {
        _one("#feedback").innerHTML = " "
        _one("#feedback").innerHTML = "User information has been updated. <br> You can now use the new password"
    }


}
</script>



<?php
require_once('components/footer.php');
?>