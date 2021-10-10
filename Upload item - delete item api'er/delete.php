<?php
require_once('globals.php');
$db = _api_db();

try {
    // Get ID from URL
    $id = $_GET['id'];
    //SQL Statement - refers to user with Variables ":id"
    $q = $db->prepare('DELETE FROM items WHERE id = :id');
    //Replace placeholder ID with URL ID
    $q->bindValue(':id', $id);
    // Executing the change
    $q->execute();
    echo 'Number of rows deleted: ' . $q->rowCount() . "</br>" .  '  User with id:' . $id . ' has been removed';
} catch (PDOException $ex) {
    echo $ex;
}
