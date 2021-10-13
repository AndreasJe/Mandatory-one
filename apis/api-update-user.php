<?php
session_start();
require_once('globals.php');


try {
    $db = _db();
} catch (Exception $ex) {
    _res(500, ['info' => 'system under maintainance', 'error' => __LINE__]);
}

try {
    $id = $_SESSION['user_id'];
    $pass = $_POST['new_password'];
    //$email = $_POST['new_email'];


    $q = $db->prepare('UPDATE users SET user_password = :user_password WHERE user_id = :id');
    //$q = $db->prepare('UPDATE users SET user_email = :user_email WHERE user_id = :id');
    $q->bindValue(':id', $id);
    $q->bindValue(':user_password', $pass);
    //q->bindValue(':user_email', $email);
    $q->execute();
    echo 'Number of rows updated: ' . $q->rowCount();
} catch (PDOException $ex) {
    echo $ex;
    echo 'No dice! ';
    exit();
}
