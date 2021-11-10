<?php
session_start();
if (!isset($_SESSION['user_name'])) {
    header('Location: login');
    exit();
}
?>



<?php
$_title = 'Upload Product';
require_once('components/header.php');
?>
<main>
    <div class="form_container">
        <form onsubmit="validate(upload_item); return false">
            <input placeholder="Name for item" name="item_name" type="text" data-validate="str" data-min="2"
                data-max="20"><br>

            <input class="custom-file-input" placeholder="Image of item" type="file" name="image"><br>
            <button onclick="upload_item()">Upload item</button>
        </form>
    </div>

    <section>
        <div class="invisible" id="items"></div>

    </section>
</main>

<script>
async function upload_item() {
    const form = event.target
    const item_name = _one("input[name='item_name']", form).value
    const conn = await fetch("apis/api-upload-item.php", {
        method: "POST",
        body: new FormData(form)
    })
    const res = await conn.text();
    let length = 22
    let trimmedString = res.substring(0, length)
    console.log(res);
    if (conn.ok) {
        document.getElementById("items").style.display = "block";
        _one("#items").insertAdjacentHTML('afterbegin', `
        <div class="item">
          <div>
          <h4>
          ID: </h4>${res}</div>
          <div><h4>
          Name: </h4> ${item_name}</div>
          <div>
          <img class="product-img" src="/uploads/img_${res}" alt="${item_name}">
          </div>
          <div>
         
          <input type="button" onsubmit="return false" value="🗑️"
            onclick="window.location.href='apis/api-delete-item.php?item_id=${res}'"> </div>
        </div>`)
    }


    _one("input[name='item_name']", form).value = ""
    let element = document.getElementById("items");
    element.classList.remove("invisible");

}
</script>




<?php
$_title = 'Upload item';
require_once('components/footer.php');
?>