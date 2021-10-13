<?php
session_start();
if (!isset($_SESSION['user_name'])) {
    header('Location: login');
    exit();
}
$_title = 'Update user';
require_once('components/header.php');
?>

<main>
    <div class="form_container">

        <h4>Change user information</h4>

        <form id="form_update_user" onsubmit="return false">
            <label for="new_password">Password</label>
            <input type="password" name="new_password" placeholder="<?php echo $_SESSION['user_password'] ?> "><br>
            <label for="new_email">Email</label>
            <input type="text" name="new_email" placeholder="<?php echo $_SESSION['user_email'] ?> "><br>

            <button onclick="update()" name="user_dlt">Update</button>

            <em>Click the button to confirm the change</em>
        </form>
    </div>


    <div>



        <h4>Here is your Session data</h4>
        <?php
        echo '<pre>' . print_r($_SESSION, TRUE) . '</pre>'; ?>


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
        if (conn.ok) {}

    }
</script>

<?php
require_once('components/footer.php');
?>