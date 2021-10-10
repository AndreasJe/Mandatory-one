<?php
require_once('globals.php');


// Seperating the first database check
try {
    $db = _db();
} catch (Exception $ex) {
    _res(500, ['info' => 'system under maintainance', 'error' => __LINE__]);
}

// Trying to do something here.....
try {
    // Get ID from SESSION & POST email and password from FORM
    $id = $_SESSION['user_id'];
    $email = $_POST['new_email'];
    $pass = $_POST['new_password'];

    //SQL Statement - refers to user with variabel ":id"
    $q = $db->prepare('UPDATE users SET user_password = :user_password WHERE id = :id');
    $q = $db->prepare('UPDATE users SET user_email = :user_email WHERE id = :id');
    //Replace placeholders with real info
    $q->bindValue(':id', $id);
    $q->bindValue(':user_email', $email);
    $q->bindValue(':user_password', $pass);
    // Executing the change
    $q->execute();
    // Note changes in console
    echo 'Number of rows updated: ' . $q->rowCount();
} catch (PDOException $ex) {
    echo '{"info":"Speak to an adult!"}';
    exit();
}
