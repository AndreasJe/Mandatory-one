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

<div class="form_container">
    <form onsubmit="validate(upload_item); return false">
        <label for="item_name">Name:</label>
        <input name="item_name" type="text" data-validate="str" data-min="2" data-max="20"><br>

        <input type="file" name="image"><br>
        <button>Upload item</button>
    </form>
</div>

<div>
    <img src="http://localhost/uploads/img_ab7fd9a6f43c9fff8df4ab97c77c61a7c901be1c80ab" alt="">
</div>

<div id="items"></div>


<script>
    async function upload_item() {
        const form = event.target
        var length = 22
        const item_name = _one("input[name='item_name']", form).value
        const conn = await fetch("apis/api-upload-item", {
            method: "POST",
            body: new FormData(form)
        })
        const res = await conn.text();
        console.log(res);
        var trimmedString = res.substring(0, length)
        if (conn.ok) {
            _one("#items").insertAdjacentHTML('afterbegin', `
        <div class="item">
          <div>
          <h4>
          ID: </h4>${trimmedString}</div>
          <div><h4>
          Name: </h4> ${item_name}</div>
          <div><h4>
          Image URL: </h4> <a href="/uploads/img_${res}" >Click to see img</a>
          </div>
          <div><h4>
          Delete: </h4>
<input type="button" onsubmit="return false" value="🗑️" onclick=window.location.href='apis/api-delete-item.php?item_id=${trimmedString}'>
          </div>
        </div>`)
        }
    }
</script>




<?php
$_title = 'Upload item';
require_once('components/footer.php');
?>