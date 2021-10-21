<?php
session_start();
if (!isset($_SESSION['user_name'])) {
    header('Location: login');
    exit();
}
?>
<?php
$_title = 'View Products';
require_once('components/header.php');

require_once('apis/globals.php');

try {
    $db = _db();
} catch (Exception $ex) {
    _res(500, ['info' => 'system under maintainance', 'error' => __LINE__]);
}


$q = $db->prepare('SELECT * FROM items ');
$q->execute();
$items = $q->fetchAll(PDO::FETCH_OBJ);
?>

<script>
    $('a#delete').on('click', function(e) {
        e.preventDefault();


    });
</script>


<div id="items">
    <?php


    foreach ($items as $item) {
        echo '
        <div class="item">
          <div>
          <h5>
          ID: </h5><p>' . $item->item_id . '</p></div>
          <div><h5>
          Name: </h5><p class="capital">' . $item->item_name . '</p></div>
          <div>
          <img class="product-img" src="/uploads/img_' . $item->item_id . ' " alt="' . $item->item_name . '">
          </div>
          <div>
         
          <a class="button m-0 ms-5 d-flex h-100 align-items-center" id="delete" href="apis/api-delete-item.php?item_id=' . $item->item_id .  ' "> 🗑️
            </a> </div>
        </div>';
    }
    ?>

</div>



<?php
$_title = 'Upload item';
require_once('components/footer.php');
?>