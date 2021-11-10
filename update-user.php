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

    <div class="row w-100">

        <div class="col-12  col-xxl-4  d-flex justify-content-center  mt-4">

            <div class="form_container">
                <div class="form_title">
                    <h2>Update information</h2>
                </div>


                <form id="form_update_info" onsubmit="return false">
                    <input type="text" name="new_name" placeholder="Name">
                    <input type="email" name="new_email" placeholder="Email">
                    <div>
                        <button onclick="updateInfo()">Update</button>

                    </div>
                </form>
                <div id="feedback3" class="container info">
                    <em class="text-center">Click the button to confirm the change</em>
                </div>
            </div>
        </div>
        <div class="col-12  col-xxl-4  d-flex justify-content-center  mt-4">

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
        </div>
        <div class="col-12  col-xxl-4  d-flex justify-content-center  mt-4">

            <div class="form_container">
                <div class="form_title">
                    <h2>Change your avatar</h2>
                </div>


                <form id="form_update_picture" onsubmit="return false">
                    <input class="custom-file-input" placeholder="Select a recent image" type="file" name="image"><br>
                    <div>
                        <button onclick="updatePhoto()">Update</button>

                    </div>
                </form>
                <div id="feedback2" class="container info">
                    <em class="text-center">Click the button to confirm the change</em>
                </div>
            </div>
        </div>


    </div>








</main>


<script>
async function update() {
    const form = event.target.form
    console.log(form)
    let conn = await fetch("apis/api-change-password", {
        method: "POST",
        body: new FormData(form)
    })


    let res = await conn
    if (conn.ok) {
        _one("#feedback").innerHTML = " "
        _one("#feedback").innerHTML = "Password has been changed! <br> Dont forget it!"
    }


}
async function updatePhoto() {
    const form = event.target.form
    console.log(form)
    let conn = await fetch("apis/api-upload-profilepic", {
        method: "POST",
        body: new FormData(form)
    })
    location.reload();

}
async function updateInfo() {
    const form = event.target.form
    console.log(form)
    let conn = await fetch("apis/api-update-info", {
        method: "POST",
        body: new FormData(form)
    })
    _one("#feedback3").innerHTML = " "
    _one("#feedback3").innerHTML = "User information has been updated"
}
</script>



<?php
require_once('components/footer.php');
?>