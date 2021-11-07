<?php
session_start();
if (!isset($_SESSION['user_name'])) {
    header('Location: login');
    exit();
}
$_title = 'Edit Profile';
require_once('components/header.php');
?>

<main>
    <div class="form_container">
        <div class="form_title">
            <h2>Change password</h2>
        </div>


        <form id="form_update_user" onsubmit="return false">
            <input type="password" name="current_password" placeholder="Current password ">
            <input type="password" name="new_password" placeholder="New password ">
            <input type="password" name="confirm_password" placeholder="Confirm password">
            <div>
                <button onclick="update()" name="user_dlt">Update</button>

            </div>
        </form>
        <div id="feedback" class="container info">
            <em class="text-center">Click the button to confirm the change</em>
        </div>
    </div>


    <div class="form_container">
        <div class="form_title">
            <h2>Change your profile pic</h2>
        </div>


        <form id="form_update_picture" onsubmit="return false">
            <input class="custom-file-input" placeholder="Image of item" type="file" name="image"><br>
            <div>
                <button onclick="updatePhoto()" name="image">Update</button>

            </div>
        </form>
        <div id="feedback2" class="container info">
            <em class="text-center">Click the button to confirm the change</em>
        </div>
    </div>




</main>


<script>
    async function update() {
        const form = event.target.form
        console.log(form)
        let conn = await fetch("apis/api-update-user", {
            method: "POST",
            body: new FormData(form)
        })


        let res = await conn
        if (conn.ok) {
            _one("#feedback").innerHTML = " "
            _one("#feedback").innerHTML = "User information has been updated. <br> You can now use the new password"
        }


    }
    async function updatePhoto() {
        _one("#feedback2").innerHTML = " "
        _one("#feedback2").innerHTML = "Photo has been uploaded"

    }
</script>



<?php
require_once('components/footer.php');
?>