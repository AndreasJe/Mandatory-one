<?php
session_start();
if (!isset($_SESSION['user_name'])) {
    header('Location: login');
    exit();
}
?>

<?php
$_title = 'Dashboard';
require_once('components/header.php');
?>

<main>


    <section class="styled-section">

        <h2 class="text-center mb-5 pb-5">
            <?php echo ' Hello ' . $_SESSION['user_name'] . '!'    ?>
        </h2>

        <p class="userinfo">
            <?php echo ' Here is your email adress: <bold>' . $_SESSION['user_email']; ?>
            </bold> <br><br>
            <?php echo ' Dont forget your password (this is what i see): <bold>' . $_SESSION['user_password']; ?>
            </bold> <br><br> <?php echo ' What about that ID?<bold> ' . $_SESSION['user_id'];  ?>
            </bold><br><br>
            If you want to change this information, you can do so by using the user menu in the top right
            corner.
        </p>

        <?php if ($_SESSION['user_verified'] < "1") : ?>
        <h5 class="text-center mt-5 text-danger"> You should verify your user!</h5>
        <?php else :  ?>

        <h5 class="text-center mt-5 text-success"> User has been verified!</h5>

        <?php endif; ?>
        </h5>
        <div class="subinfo">



            <h5>Here is your raw SESSION data:</h5><br>
            <?php
            echo '<pre>' . print_r($_SESSION, TRUE) . '</pre>'; ?>


        </div>
    </section>
</main>





<?php
require_once('components/footer.php');
?>