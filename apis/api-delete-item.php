<?php

require_once('globals.php');

try {
    $db = _db();
} catch (Exception $ex) {
    _res(500, ['info' => 'system under maintainance', 'error' => __LINE__]);
}


try {
    // Get ID from URL  
    $id = $_GET['item_id'];
    //SQL Statement - refers to user with Variables ":id"
    $q = $db->prepare('DELETE FROM items WHERE item_id = :id');
    //Replace placeholder ID with URL ID
    $q->bindValue(':id', $id);
    // Executing the change
    $q->execute();
    echo 'Number of rows deleted: ' . $q->rowCount() . "</br>" .  '  User with id:' . $id . ' has been removed';
    header('Location: ../upload-item.php');
    exit();
} catch (PDOException $ex) {
    echo '{"info":"Speak to an adult!"}';
    exit();
}
