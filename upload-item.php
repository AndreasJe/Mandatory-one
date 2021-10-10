<?php
session_start();
if (!isset($_SESSION['user_name'])) {
    header('Location: login');
    exit();
}
?>
<?php
$_title = 'Upload item';
require_once('components/header.php');
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="app.css">
    <title>Document</title>
    <script src="validator.js"></script>
</head>

<body>
    <div class="form_container">
        <form onsubmit="validate(upload_item); return false">
            <input name="item_name" type="text" data-validate="str" data-min="2" data-max="20"><br>
            <button>Upload item</button>
        </form>
    </div>

    <div id="items"></div>


    <script>
        async function upload_item() {
            const form = event.target
            // Had to use a fixed length, because the ID was longer when applied to the URL, then it was in the database. 
            // Absolutely no clue why, but the logical solution (trimmedString) works fine.
            var length = 22
            const item_name = _one("input[name='item_name']", form).value
            const conn = await fetch("apis/api-upload-item", {
                method: "POST",
                body: new FormData(form)
            })
            const res = await conn.text()
            console.log(res)
            var trimmedString = res.substring(0, length)
            if (conn.ok) {
                _one("#items").insertAdjacentHTML('afterbegin', `
        <div class="item">
          <div>${trimmedString}</div>
          <div>${item_name}</div>
          <div>
          <button class="fix" onsubmit="return false" onclick=window.location.href='apis/api-delete-item.php?id=${trimmedString}'> 🗑️</button>
          </div>
        </div>`)
            }
            _one("input[name='item_name']", form).value = ""
        }
    </script>


</body>

</html>